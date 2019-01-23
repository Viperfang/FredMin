<?php

// Page name
$pagename ="Rain Check";

// Include Files
include ('../head.php');
include ('../config/config.php');

// Main Content
echo "<h2>Servers Online:</h2>";

// EXAMPLE SERVER LIST

// List Servers to ping
// SrvPing ('Service Name','IP Address','Port To Ping');
SrvPing ('Teal Website','tealpress.com','80');
SrvPing ('Virtual Server','192.168.0.10','8006');
SrvPing ('Development Server','192.168.0.211','80');
SrvPing ('Workstation','127.0.0.1','80');
SrvPing ('Mail Server','192.168.0.10','8006');
SrvPing ('Picking Server','192.168.0.2','80');
SrvPing ('Mirror Server','192.168.0.6','80');
SrvPing ('Opera Server','192.168.0.243','445');
SrvPing ('Exchange Server','192.168.0.1','25');
SrvPing ('NAS Server 01','192.168.0.9','22');
SrvPing ('NAS Server 02','192.168.0.8','22');
SrvPing ('Internet Router','192.168.0.250','80');

// Footer
include ('foot.php');


//Functions

// Ping Services for Online Status
function SrvPing($ServiceName,$IpAddress,$Port) {
    if (!$socket = @fsockopen($IpAddress, $Port, $errno, $errstr, 10)) {
        echo "
            <strong>
            <font color='red'>
            <img width='20px' src='offline.png' alt=''>
            - OFFLINE -  $ServiceName
            </font>
            </strong>
            <br />";
    }

    else
    {
        echo "
            <strong>
            <font color='green'>
            <img width='20px' src='online.png' alt=''>
            - ONLINE -  $ServiceName
            </font>
            </strong>
            <br />";
        fclose($socket);
    }
}
?>
