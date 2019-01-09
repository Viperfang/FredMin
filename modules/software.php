<?php

// Page name
$pagename ="Software Installation";

// Include Files
include ('./config/config.php');
include ('head.php');
include ('../functions.php');

// Main Content
// Restart Services
        echo "<p class='menu-header'>Software Packages</p><br />";

softmenuitem('Vim','vim.png','vim.php');
softmenuitem('SSH','openssh.png','ssh.php');
softmenuitem('S.M.A.R.T','smart.png','smart.php');


// Footer
include ('foot.php');
?>