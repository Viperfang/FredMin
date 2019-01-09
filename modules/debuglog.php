<?php

// Page name
$pagename ="Debug Log File";

// Include Files
include ('./config/config.php');
include ('head.php');
include ('./functions.php');

echo "<p class='menu-header'>Debug Log Files</p><br />";

echo "<div class='catout'>";

		$printdebug = shell_exec('sudo cat /var/log/debug');
		echo "$printdebug";
        
echo "</div>";
        
// Footer
include ('foot.php');
?>