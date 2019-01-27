<?php

// Page name
$pagename ="Cronjob Editor";

// Include Files
include ('./config/config.php');
include ('head.php');
include ('../functions.php');

// Open File
$readfile = shell_exec('sudo cat /etc/cron.d/php');

echo "
<form action='#' method='post'>
<textarea rows='30' cols='140' name='text'>
$readfile
</textarea><br />
<input type='submit' name='submit' value='Save'>
</form>
";


$textarea = $_POST["textarea"];

if ($_POST != ""){
    echo $textbox;
}

// Footer
include ('foot.php');
?>
