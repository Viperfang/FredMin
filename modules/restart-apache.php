<?php

// Page name
$pagename ="Restart Apache";

// Include Files
include ('./config/config.php');
include ('head.php');
include ('../functions.php');

// Main Content
	shell_exec('sudo service apache2 restart');
    echo "Apache Service Restarted";
// Footer
include ('foot.php');
?>
