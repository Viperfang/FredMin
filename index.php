<?php

// Webpage Name
$pagename ="Welcome";

// Include Files
include ('config/config.php');
include ('head.php');
include ('functions.php');

// CONTENT
include ('modules.php');
// include ('custom-modules/config.php');

// List Custom Module Names (alphabetical order)
foreach (glob("custom-modules/*",GLOB_ONLYDIR) as $file) {
    include ($file . '/config.php');
    echo "<div class='icon'>\n";
    echo "<a class='icon' href='$file/module.php'>\n";
    echo "<img class='icon' src='" . $file . "/icon.png' height='50px'>\n";
    echo "<br />$appname</a>\n";
    echo "</div>\n\n";
}

// Footer
include ('foot.php');

?>
