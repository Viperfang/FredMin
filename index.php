<?php

// Webpage Name
$pagename ="Welcome";

// Include Files
include ('config/config.php');
include ('head.php');
include ('functions.php');

// CONTENT

    // Restart Services

        echo "<p class='menu-header'>Restart Services</p><br />";

        menuitem('Restart Apache','apache.png','restart-apache.php');
        menuitem('Restart MySql','mysql.png','restart-mysql.php');
        menuitem('Restart SSH','ssh.png','restart-ssh.php');
        menuitem('Restart Server','serv-icon.png','restart-server.php');

    // Programs
        echo "<p class='menu-header'>Programs</p></br>";

        menuitem('PHPMyAdmin','phpmyadmin.png','../phpmyadmin');
        menuitem('PHP Info','php.png','phpinfo.php');
        menuitem('Install Software','install.png','software.php');
        menuitem('File Explorer','files.png','file-explorer.php');
        menuitem('Command Line','ssh.png','cmd-line.php');

    // Maintenance
        echo "<p class='menu-header'>Maintenance</p></br>";

        menuitem('Run Backup','backup.png','backup.php');
        menuitem('Update Server','update.png','update.php');
        menuitem('SMART Status','smart.png','smart.php');
        menuitem('Change Hostname','ssh.png','edit-hostname.php');

    // Logs
        echo "<p class='menu-header'>Logs</p></br>";
        menuitem('Auth Log','log.png','authlog.php');
        menuitem('Kernal Log','log.png','kernallog.php');
        menuitem('Debug Log','log.png','debuglog.php');

    // Custom Plugins
        echo "<p class='menu-header'>Custom Modules</p></br>";
        include ('custom-modules/config.php');

// Footer
include ('foot.php');

?>
