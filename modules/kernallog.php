<?php

// Page name
$pagename ="Kernal Log File";

// Include Files
include ('./config/config.php');
include ('head.php');
include ('../functions.php');

echo "<p class='menu-header'>Kernal Logs</p><br />";

echo "<div class='catout'>";

		$printkern = shell_exec('sudo cat /var/log/kern.log');
		echo "$printkern";
        
echo "</div>";

// Footer
include ('foot.php');      
?>
