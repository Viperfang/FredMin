<?php

// Page name
$pagename ="Add User";

// Include Files
include ('./config/config.php');
include ('head.php');
include ('../functions.php');

echo "<p class='menu-header'>Add System Users</p>";

echo "<form name='form' method='post' action='add-sys-user.php'>
        <table>
<p>* Required Fields.
        <tr><td>
            * Username:
        </td><td>
            <input name='$username' size='40' value=''>
        </td></tr>

        <tr><td>
            * Password:
        </td><td>
            <input name='$passwd1' type='password' size='40' value=''>
        </td></tr>

        <tr><td>
            * Confirm Password:
        </td><td>
            <input name='$passwd2' type='password' size='40' value=''>
        </td></tr>
        <tr><td>
            Full Name:
        </td><td>
            <input name='$fullname' size='40' value=''>
        </td></tr>

        <tr><td>
            Room No:
        </td><td>
            <input name='$roomno' size='40' value=''>
        </td></tr>

        <tr><td>
            Work Phone:
        </td><td>
            <input name='$workno' size='40' value=''>
        </td></tr>

        <tr><td>
            Home Phone:
        </td><td>
            <input name='$homeno' size='40' value=''>
        </td></tr>

        <tr><td>
            Other:
        </td><td>
            <input name='$other' size='40' value=''>
        </td></tr>

        <tr>
        <td>
        <input type='submit' id='search-submit' value='Add User' />
        </td>
        </tr>

        </table>

    </form>
";

$text_box = $_POST["text_box"];

if ($text_box != ""){
    $cmdline = shell_exec("echo '$passwd1\n$passwd2\n$fullname\n$roomno\n$workno\n$homeno\n$other\nY\n' | sudo adduser $username");
    echo "<pre>$cmdline</pre>";
    echo "User Added?";
}

// Footer
include ('foot.php');
?>
