<?php

// Page name
$pagename ="Server Update";

// Include Files
include ('./config/config.php');
include ('head.php');
include ('../functions.php');

echo "<p class='menu-header'>Server Update</p><br />";

echo "<div class='catout'>";

		$printupdate = shell_exec('sudo apt-get update && sudo apt-get upgrade -y');
		echo "$printupdate";
        
echo "</div>";

// Footer
include ('foot.php');      
?>
