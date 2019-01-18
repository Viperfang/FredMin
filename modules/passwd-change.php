<?php

// Page name
$pagename ="Password Changer";

// Include Files
include ('./config/config.php');
include ('head.php');
include ('../functions.php');

echo "<p class='menu-header'>Reset User Password</p><br />
      Change existing user password <br /><br />";
      
echo "<form name='form' method='post' action='passwd-change.php'>
        <table>
        <tr>
            <td>
            Username: 
            </td>
        
            <td>
            <input name='$userset' size='40' value=''>
            </td>
        </tr>
        
        <tr>
            <td>
            Password:
            </td>
        
            <td>
            <input name='$passwd' size='40' value=''>
            </td>
        </tr>
        
        <tr>
        <td>
        <input type='submit' id='search-submit' value='Change' />
        </td>
        </tr>
        
        </table>
        
    </form>
";

$text_box = $_POST["text_box"];
if ($text_box != ""){
    $cmdline = shell_exec("echo -e '$passwd\n$passwd' | sudo passwd $userset");
    echo "<pre>$cmdline</pre>";    
}

// Footer
include ('foot.php');      
?>