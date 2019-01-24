<?php

// Page name
$pagename ="Server Stats";

// Include Files
include ('../head.php');
include ('../config/config.php');

// Main Content
cmdline('System Name','cat /etc/hostname');
cmdline('IP Address','hostname -I');
cmdline('System Uptime','uptime');
cmdline('Operating System','uname -a');
cmdline('System Time','date');

echo "<p><strong>System Usage:</strong></p>";

// Bar Graph Display
echo "<p>CPU Load</p>";
BarGraph(CPULoad(),100,400,10);

echo "<p>RAM Usage</p>";
BarGraph(RAMLoad(),100,400,10);

echo "<p>Disk Usage</p>";
BarGraph(DiskUse(),100,400,10);

// Footer
include ('foot.php');

// Cmd Line Print Function
function cmdline($name,$cmd) {
    echo "<strong>$name:</strong>";
    $cmdline = shell_exec("$cmd");
    echo "<pre>$cmdline</pre>";
    echo "<br />";
}

// Bar Graph Generator
Function BarGraph ($value,$total,$barwidth,$barheight) {

    // Calculates bargraph dimensions
    $ratio = $barwidth/$total;
    $barvaluewidth = $ratio*$value;

    // Calculate percentage for else statement
    $Percentage = ($total/100)*$value;

    // Change bar colour depending on value
    if ($Percentage > 80) {
        $barcolour = "#e53b3b"; // Red
    }

    else {
        $barcolour = "#5daffc"; // Blue
    }

    echo "
        <div style='
            background-color: #cccccc;
            height: $barheight;
            width: $barwidth;'>
                <div style='
                    background-color: $barcolour;
                    height: $barheight;
                    width: $barvaluewidth;'>
                </div>
        </div>
    ";
}

// Get CPU Load
function CPULoad(){
    $load = sys_getloadavg();
    return $load[0];
}

// Get RAM Usage Percentage
function RAMLoad(){
    $free = shell_exec('free');
    $free = (string)trim($free);
    $free_arr = explode("\n", $free);
    $mem = explode(" ", $free_arr[1]);
    $mem = array_filter($mem);
    $mem = array_merge($mem);
    $memory_usage = $mem[2]/$mem[1]*100;
    return $memory_usage;
}

// Get System Disk Usage
function DiskUse(){
   return 12;
}

?>
