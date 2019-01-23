<?php

// Page name
$pagename ="IP Address Editor";

// Include Files
include ('./config/config.php');
include ('head.php');
include ('../functions.php');

// Get IP Address config file
$readfile = shell_exec('sudo cat /etc/network/interfaces');

// Get current IP address
$getip = shell_exec('hostname -I');
$currentip = str_ireplace(' ','',$getip);
// Display Header Bar
echo "<p class='menu-header'>Edit IP Address</p><br />";

// Detect Static IP
if (strpos($readfile, 'address') !== false) {

    // Displays current IP address
    echo "Your servers IP address is: $currentip <br /><br />";

    // Generate Form
    echo "<form name='form' method='post' action='edit-ip.php'>
            <input name='text_box' value='$currentip'>
            <input type='submit' id='search-submit' value='Save' />
        </form>
        ";
}
else {
    // Display error
    echo '<h3>No static IP detected!</h3>';
}

// Displays current IP config

// Test Print New Config

// Runs the change IP Function
$text_box = $_POST["text_box"];

if ($text_box != ""){

    $srchreplace = str_ireplace($currentip,$text_box."\n",$readfile);
    echo "
    <br />
    <strong>Please restart your server to enable changes</strong>
    <br />

    <form action='restart-server.php' method='post'>
    <input type='submit' value='Restart Now' />
    </form>

    <form action='../index.php' method='post'>
    <input type='submit' value='Restart Later' />
    </form>
    ";

    shell_exec("sudo echo '$srchreplace' > /etc/network/interfaces");

}

// Footer
include ('foot.php');
?>
