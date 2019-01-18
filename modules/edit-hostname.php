<?php

// Page name
$pagename ="Hostname Editor";

// Include Files
include ('./config/config.php');
include ('head.php');
include ('../functions.php');

$readfile = shell_exec('sudo cat /etc/hostname');
$read_host = shell_exec('sudo cat /etc/hosts');
echo "<p class='menu-header'>Edit Hostname</p><br />";
echo "<form name='form' method='post' action='edit-hostname.php'>
        <input name='text_box' value='$readfile'>
        <input type='submit' id='search-submit' value='Save' />
    </form> 
    <p>* Warning: This only changes The /etc/hostname file</p>
";

$text_box = $_POST["text_box"];

if ($text_box != ""){
    shell_exec("echo $text_box | sudo tee /etc/hostname");
    // force refresh page to display correct data
    Header('Location: '.$_SERVER['PHP_SELF']); 
}	

// Footer
include ('foot.php');      
?>
