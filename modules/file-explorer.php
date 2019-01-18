<?php

// Page name
$pagename ="File Explorer";

// Include Files
include ('./config/config.php');
include ('head.php');
include ('../functions.php');

echo "<p class='menu-header'>File Browser</p><br />
      Type the folder path to view files";
echo "<form name='form' method='post' action='file-explorer.php'>
        <input name='text_box' value='/'>
        <input type='submit' id='search-submit' value='Go' />
    </form>
";

$text_box = $_POST["text_box"];
if ($text_box != ""){
    $filesearch = shell_exec("ls $text_box");
    echo "<pre>$filesearch</pre>";    
}

// Footer
include ('foot.php');      
?>