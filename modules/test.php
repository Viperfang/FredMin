<?php
$command = shell_exec('sudo cat /etc/network/interfaces');
// echo $command;

$ipold = '192.168.0.213';
$ipnew = '######################';
$readfile = str_replace($ipold,$ipnew,$command);
echo $readfile;

?>