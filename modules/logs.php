<?php

// Page name
$pagename ="System Logs";

// Include Files
include ('./config/config.php');
include ('head.php');
include ('../functions.php');

// Content
echo "
<form action='#' method='request'>
<select name='log[]'>
<option value='/var/log/kern.log'>Kernal</option>
<option value='/var/log/auth.log'>Authentication</option>
<option value='/var/log/debug.log'>Debug</option>
<option value='/var/log/messages'>Messages</option>
<option value='/var/log/boot.log'>Boot</option>
<option value='/var/log/dmesg'>Dmessage</option>
<option value='/var/log/apt/history.log'>Apt History</option>
<option value='/var/log/syslog'>syslog</option>
</select>
<input type='submit' name='submit' value='Go' />
</form>
";

if(isset($_REQUEST['submit'])){
    foreach ($_REQUEST['log'] as $logfile) {
        $printkern = shell_exec("sudo cat $logfile");
        echo "<div class='catout'>$printkern</div>";
    }
}

// Footer
include ('foot.php');
?>
