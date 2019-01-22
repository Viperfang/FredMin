<?php

// Build Homepage Menu System
function menuitem($menuname,$iname,$fname) {
    echo "
        <div class='icon'>
            <a class='icon' href='modules/$fname'>
            <img class='icon' src='images/$iname'>
            <br /> $menuname </a>
        </div>";
}


// Build Software Menu System
function softmenuitem($menuname,$iname,$fname) {
    echo "
        <div class='icon'>
            <a class='icon' href='../software/$fname'>
            <img class='icon' src='../images/$iname'>
            <br /> $menuname </a>
        </div>";
}

// Build Custom Module Icons
function custommenuitem($menuname,$iname,$fname) {
    echo "
        <div class='icon'>
            <a class='icon' href='custom-modules/$fname'>
            <img class='icon' src='custom-modules/$iname'>
            <br /> $menuname </a>
        </div>";
}

// Display SMART Drive status
function smartstatus($diskheader,$disk) {
    // Get SMART disk information
    $print = shell_exec("sudo smartctl -i /dev/$disk");

    // If drive exists display to screen
    if (\strpos($print, '=== START OF INFORMATION SECTION ===') !== false) {
        echo "
            <p class='menu-header'>$diskheader</p><br />
            <div class='catout'>
            $print
            </div>
        ";
    }
}

// Make Pretty Bargraphs - Purrrr...
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
}

?>
