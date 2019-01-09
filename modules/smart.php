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
    
    
// Footer
include ('foot.php');
?>












