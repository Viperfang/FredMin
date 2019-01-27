<?php

// List Module Names (only Folders)
foreach (glob("custom-modules/*",GLOB_ONLYDIR) as $file) {

    // Print out to screen
    include ($file . '/config.php');
    echo "<a class='icon' href='$file/module.php'>\n";
    echo "<img class='icon' src='" . $file . "/icon.png' height='50px'>\n";
    echo "<br />$appname</a>\n";
}

/*

<div class='icon'>
    <a class='icon' href='modules/$fname'>
    <img class='icon' src='images/$iname'>
    <br /> $menuname </a>
</div>";

*/

// SAMPLE
// menuitem('Restart Apache','apache.png','restart-apache.php');

?>
