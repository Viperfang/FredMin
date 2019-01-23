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
$currentip = str_replace(' ','',$getip);
// Display Header Bar
echo "<p class='menu-header'>Edit IP Address</p><br />";

// Displays current IP address
echo "Your servers IP address is: $currentip";

// Generate Form
echo "<form name='form' method='post' action='edit-ip.php'>
        <input name='text_box' value='$currentip'>
        <input type='submit' id='search-submit' value='Save' />
    </form>
    ";

// Displays current IP config

// Test Print New Config

// Runs the change IP Function
$text_box = $_POST["text_box"];

if ($text_box != ""){

    $srchreplace = str_replace($currentip,$text_box,$readfile);
    echo "<br /><strong>Please restart your server to enable changes</strong><br /><br /><pre>$srchreplace</pre>";
    shell_exec('echo $srchreplace | sudo tee /var/www/html/FredMin/modules/test.txt');
}

// Footer
include ('foot.php');
?>
