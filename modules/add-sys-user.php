<?php

// Page name
$pagename ="Add User";

// Include Files
include ('./config/config.php');
include ('head.php');
include ('../functions.php');

echo "<p class='menu-header'>Adds New System User</p><br />";

echo "<form method='post' action='add-sys-user.php'>
        <p>* Required Fields.</p>
        <table>
        <tr><td>
            * Username:
        </td><td>
            <input name='username' size='40' value=''>
        </td></tr>

        <tr><td>
            * Password:
        </td><td>
            <input name='passwd1' type='password' size='40' value=''>
        </td></tr>

        <tr><td>
            * Confirm Password:
        </td><td>
            <input name='passwd2' type='password' size='40' value=''>
        </td></tr>
        <tr><td>
            Full Name:
        </td><td>
            <input name='fullname' size='40' value=''>
        </td></tr>

        <tr><td>
            Room No:
        </td><td>
            <input name='roomno' size='40' value=''>
        </td></tr>

        <tr><td>
            Work Phone:
        </td><td>
            <input name='workno' size='40' value=''>
        </td></tr>

        <tr><td>
            Home Phone:
        </td><td>
            <input name='homeno' size='40' value=''>
        </td></tr>

        <tr><td>
            Other:
        </td><td>
            <input name='other' size='40' value=''>
        </td></tr>

        <tr>
        <td>
        <input type='submit' name='AddUser' value='AddUser' />
        </td>
        </tr>

        </table>

    </form>
";

// List fields for command
$uname = $_POST["username"];
$pw1 = $_POST["passwd1"];
$pw2 = $_POST["passwd2"];
$fn = $_POST["fullname"];
$rn = $_POST["roomno"];
$wn = $_POST["workno"];
$hn = $_POST["homeno"];
$otr = $_POST["other"];

// Run on form submit
if ($_POST != ""){
$cmd = shell_exec("
    echo '$pw1\n$pw2\n$fn\n$rn\n$wn\n$hn\n$otr' | sudo adduser $uname
");
    // echo "<p><strong>User created - $uname - Success!</strong></p>";
}

// Footer
include ('foot.php');
?>
