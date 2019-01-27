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
                array('id'=>'logview','title'=>'Log Viewer'),
            );
        }

        function loadPage($id)
        {
            switch($id)
            {
            case 'logview':
                return "Log View module loaded";
                break;
            default: // If this runs, we got problems
                return "LogView module is not responsible for page '$id'";
                break;
            }
        }

    }
