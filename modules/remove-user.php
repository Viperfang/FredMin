<?php

// Page name
$pagename ="Remove Users";

// Include Files
include ('./config/config.php');
include ('head.php');
include ('../functions.php');

echo "<p class='menu-header'>Remove user and files</p><br />
      Warning - This will remove user and data.<br /><br />";

echo "<form method='post' action='remove-user.php'>
        <table>
        <tr>
            <td>
            Username:
            </td>

            <td>
            <input name='username' size='40' value=''>
            </td>
        </tr>

        <tr>
        <td>
        <input type='submit' id='submit' value='Remove User' />
        </td>
        </tr>

        </table>

    </form>
";

$userset = $_POST["username"];

if ($_POST != ""){
    $cmdline = shell_exec("sudo userdel -r -f $userset");
    // echo "<pre>$cmdline</pre>";
    // echo "<p>changed $userset's password - Success. $passwd</p>";
}

// Footer
include ('foot.php');
?>
