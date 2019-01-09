<?php

// Page name
$pagename ="Reboot Server";

// Include Files
include ('./config/config.php');
include ('head.php');
include ('../functions.php');

// Main Content
	shell_exec('sudo reboot');
    echo "Server Restarted";
    
// Footer
include ('foot.php');
?>
