<?php

// Page name
$pagename ="Command Line";

// Include Files
include ('./config/config.php');
include ('head.php');
include ('../functions.php');

echo "<p class='menu-header'>Command Line</p><br />
      Command to execute";
echo "<form name='form' method='post' action='cmd-line.php'>
        <input name='text_box' size='80' value=''>
        <input type='submit' id='search-submit' value='Run' />
    </form>
";


$text_box = $_POST["text_box"];
if ($text_box != ""){
    $cmdline = shell_exec("$text_box");
    echo "<pre>$cmdline</pre>";    
}

// Footer
include ('foot.php');      
?>