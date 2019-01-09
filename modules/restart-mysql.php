<?php

// Page name
$pagename ="Restart MySQL";

// Include Files
include ('./config/config.php');
include ('head.php');
include ('../functions.php');

// Main Content
    shell_exec('sudo service mysql restart');
    echo "MySql Service Restarted";
    
// Footer
include ('foot.php');
?>
