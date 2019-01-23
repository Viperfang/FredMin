<?php

// Page name
$pagename ="SMART HDD Status";

// Include Files
include ('./config/config.php');
include ('head.php');
include ('../functions.php');

// Main Content

smartstatus('Device SDA','sda');
smartstatus('Device SDB','sdb');
smartstatus('Device SDC','sdc');
smartstatus('Device SDD','sdd');
smartstatus('Device SDE','sde');
smartstatus('Device SDF','sdf');
smartstatus('Device SDG','sdg');

// If drives do NOT exist, Print error
$print = shell_exec("sudo smartctl -i /dev/");
if (\strpos($print, '=== START OF INFORMATION SECTION ===') !== true) {
    echo "
        <center>
        <h2>Oops!</h2>
        <img height='200px' src='../images/dragon.jpeg'>
        <br />
        <h3>Well... No dragons here?</h3>
        </center>
    ";
}

// Footer
include ('foot.php');
?>
