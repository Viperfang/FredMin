<?php

// Page name
$pagename ="System Backup";

// Include Files
include ('./config/config.php');
include ('head.php');
include ('../functions.php');

echo "<h3>Save Backup File</h3>
    <a href='backup.zip'>backup.zip</a> <p />";

$cmd = shell_exec('sudo zip -r backup.zip /var/www/html');
echo "<div class='catout'>$cmd</div>";



// Footer
include ('foot.php');     
?>
