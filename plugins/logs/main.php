<?php

    class logs
    {

        function getName()
        {
            return "Logs";
        }

        function getDescription()
        {
            return "A system log viewer";
        }

        function DependencyCheck()
        {
            return true; // No dep checks, no massiv config options, nothin!
        }

        function init()
        {
            return;
        }

        function getStats()
        {
            return array(); // Nope, none!
        }

        function getPages()
        {
            return array(
                // ID > icon name
                array('id'=>'logs','title'=>'Log Viewer'),
            );
        }



        function loadPage($id)
        {
            switch($id)
            {
            case 'logs':
                return $this->content();
                break;
            default: // If this runs, we got problems
                return "LogView module is not responsible for page '$id'";
                break;
            }
        }

        // Content
        function content() {
            $codebase = "
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

            if(isset($_REQUEST['submit'])){
                foreach ($_REQUEST['log'] as $logfile) {
                    $printkern = shell_exec("sudo cat $logfile");
                    echo "<div class='catout'>$printkern</div>";
                }
            }

            ";



        }

    }
