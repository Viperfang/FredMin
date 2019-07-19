<?php

// Page name
$pagename ="Password Changer";

// Include Files
include ('./config/config.php');
include ('head.php');
include ('../functions.php');

echo "<p class='menu-header'>Reset User Password</p><br />
      Change existing user password <br /><br />";

echo "<form method='post' action='passwd-change.php'>
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
            Password:
            </td>

            <td>
            <input name='password' size='40' value=''>
            </td>
        </tr>

        <tr>
        <td>
        <input type='submit' id='submit' value='submit' />
        </td>
        </tr>

        </table>

    </form>
";

$userset = $_POST["username"];
$passwd = $_POST["password"];

if ($_POST != ""){
    shell_exec("echo -e '$passwd\n$passwd\n' | sudo passwd $userset\n");
    // echo "<pre>$cmdline</pre>";
    // echo "<p>changed $userset's password - Success. $passwd</p>";
}

// Footer
include ('foot.php');
?>
