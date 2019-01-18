<?php

// Page name
$pagename ="SSH Restart";

// Include Files
include ('./config/config.php');
include ('head.php');
include ('../functions.php');

// Main Content
	shell_exec('sudo service sshd restart');
    echo "SSH Service Restarted";
    
// Footer
include ('foot.php');
?>
