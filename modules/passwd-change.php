<?php

// Page name
$pagename ="Password Changer";

// Include Files
include ('./config/config.php');
include ('head.php');
include ('../functions.php');

echo "<p class='menu-header'>Reset User Password</p><br />
      Command to execute";
echo "<form name='form' method='post' action='passwd-change.php'>
        Username: <input name='$userset' size='40' value=''><br />
        Password: <input name='$passwd' size='40' value=''><br />
        <input type='submit' id='search-submit' value='Run' />
    </form>
";

// Command Line Password Changer
// $userset
// $passwd
// 

$text_box = $_POST["text_box"];
if ($text_box != ""){
    $cmdline = shell_exec("echo -e '$passwd\n$passwd' | passwd $userset");
    echo "<pre>$cmdline</pre>";    
}

// Footer
include ('foot.php');      
?>