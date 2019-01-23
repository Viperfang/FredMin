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

// Tims Thing
echo "<pre>".$readfile."</pre>";

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

    $srchreplace = str_ireplace($currentip,$text_box."\n",$readfile);
    echo "<br /><strong>
    Please restart your server to enable changes
    </strong><br /><pre>$srchreplace</pre>";

// shell_exec('sudo echo "$srchreplace" > /var/www/html/FredMin/modules/test.txt');

    // Just trying something here?
    $filename = "/var/www/html/FredMin/modules/test.txt";
    $openfile = fopen($filename, 'w'); // 'w' refers to write
    fwrite($openfile, $srchreplace);
    fclose($openfile);
}

// Footer
include ('foot.php');
?>
