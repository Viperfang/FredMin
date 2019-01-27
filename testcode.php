<?php
// List Module Names (only Folders)
foreach (glob("custom-modules/*",GLOB_ONLYDIR) as $file) {
    // Print out to screen
    include ('$file/config.php');
    echo "<a href='$file/module.php'>$file</a><br />\n";
}


// SAMPLE
// menuitem('Restart Apache','apache.png','restart-apache.php');

?>
