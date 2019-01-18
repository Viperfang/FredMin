<?php

// Page name
$pagename ="Rain Check";

// Include Files
include ('../head.php');
include ('../config/config.php');

// Main Content


// List Servers to ping

// SrvPing ('Service Name','IP Address','Port To Ping');
SrvPing ('TestServer HTTP','127.0.0.1','80');
SrvPing ('TestServer SSH','127.0.0.1','22');
SrvPing ('TestServer SSL','127.0.0.1','443');

// Footer
include ('foot.php');


//Functions

// Ping Services for Online Status
function SrvPing($ServiceName,$IpAddress,$Port) {
    if (!$socket = @fsockopen($IpAddress, $Port, $errno, $errstr, 30)) {
        echo "<font color='red'>- Offline -</font> $ServiceName<br />";
    }
    
    else
    {
        echo "<font color='green'>- Online -</font> $ServiceName<br />";
        fclose($socket);
    }
}
?>