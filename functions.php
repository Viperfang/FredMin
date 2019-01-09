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
    
// Display SMART Drive statusech
    function smartstatus($diskheader,$disk) {
        echo "<p class='menu-header'>$diskheader</p><br />";
        echo "<div class='catout'>";
            $print = shell_exec("sudo smartctl -i /dev/$disk");
            echo $print;
        echo "</div>";
    }

?>