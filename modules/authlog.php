<?php

// Page name
$pagename ="Authentication Log File";

// Include Files
include ('./config/config.php');
include ('head.php');
include ('./functions.php');

echo "<p class='menu-header'>Recent Login Attempts</p><br />";

echo "<div class='catout'>";

		$printauth = shell_exec('sudo cat /var/log/auth.log');
		echo "$printauth";
        
echo "</div>";

// Footer
include ('foot.php');
?>