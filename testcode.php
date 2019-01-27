<?php

// List Module Names (only Folders)
foreach (glob("custom-modules/*",GLOB_ONLYDIR) as $file) {

    // Print out to screen
    include ($file . '/config.php');
    echo "<img src='" . $file . "/icon.png' height='50px'><br />";
    echo "<a href='$file/module.php'>$appname</a><br /><br />\n";
}


// SAMPLE
// menuitem('Restart Apache','apache.png','restart-apache.php');

?>
