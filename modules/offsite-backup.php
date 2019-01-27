<?php

// Page name
$pagename ="Offsite Backup Solution";

// Include Files
include ('./config/config.php');
include ('head.php');
include ('../functions.php');

echo "
<h2><center>Sync files to offsite server, with Rsync</center></h2>
<form class='controls' action='offsite-backup.php' method='post'>
<table>
<tr><td>
    Remote Server Address:
    </td><td>
    <input name='serveraddress' size='40' value=''>
    </td></tr>

    <tr><td>
    Copy From:
    </td><td>
    <input name='copyfrom' size='40' value=''>
    </td></tr>

    <tr><td>
    Copy To:
    </td><td>
    <input name='copyto' size='40' value=''>
    </td></tr>

    <tr><td>
    Username:
    </td><td>
    <input name='username' size='40' value=''>
    </td></tr>

    <tr><td>
    Password:
    </td><td>
    <input name='password' type='password' size='40' value=''>
    </td></tr>

    <tr><td>
    <input type='submit' name='filesync' value='- SYNC DATA -'/>

</form>
";

// Login Settings
$serv=$_POST["serveraddress"];  // SSH Server Address
$usr=$_POST["username"];        // SSH Username
$pass=$_POST["password"];       // SSH Password

// File Locations
$from=$_POST["copyfrom"];       // Original files
$to=$_POST["copyto"];            // Copy to location

// Special Options
$dispcmd=TRUE;  // display cmdline errors
$delete=FALSE;  // enable file deletion on remote side
$force=TRUE;    // Force yes/no

// Remove no variable notice.
$del = '';
$frc = '';

// Setup Options for Rsync
    if ($delete) {$del='--delete';}
    if ($force) {$frc='--force';}

// Runs Rsync with defined commands
    if (isset($_POST['filesync'])) {

        $exec = shell_exec("sshpass -p $pass rsync $del $frc -rPz $from $usr@$serv:$to");

        if (strpos($exec, 'sending incremental file list') !== FALSE && $dispcmd) {
            // Displays Your Success :)
            echo "<p>Your files have been synced</p> <h3>Command Line Output</h3>$exec";
        }

        elseif ($dispcmd) {
            // Displays Your Failures :(
            echo "
                <center><h2>=| Failed |=</h2></center>
                <pre>$exec</pre>
            ";
        }

    }

// Footer
include ('foot.php');
?>
