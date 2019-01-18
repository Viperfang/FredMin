<?php

// Page name
$pagename ="Software Install";

// Include Files
include ('./config/config.php');
include ('head.php');
include ('../functions.php');

// Main Content
            echo "<h2>Installing Software</h2>";
	        // Run and print CMD line output
            $output = shell_exec('sudo apt-get update && sudo apt-get install vim -y');
            echo "<pre>$output</pre>";
    
// Footer
include ('foot.php');
?>
