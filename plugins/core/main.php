<?php
    
    class core
    {
        function getName()
        {
            return "Core";
        }
        
        function getDescription()
        {
            return "Provides index and plugin manager";
        }
        
        function install()
        {
            return; // No dep checks, no massiv config options, nothin!
        }
        
        function init()
        {
            return; // no startup required.
        }
        
        function getStats()
        {
            return array(); // Nope, none!
        }
        
        function getPages()
        {
            return array(
                array('id'=>'index','title'=>'Welcome','hidden'=>'true'),
                array('id'=>'plugman','title'=>'Plugin Manager')
            );
        }
        
        function loadPage($id)
        {
            switch($id)
            {
            case 'index':
                return $this->loadindex();
                break;
            case 'plugman':
                return $this->loadplugman();
                break;
            default: // If this runs, we got problems
                return "Core module does is not responsible for page '$id'";
                break;
            }
        }
        
        function loadindex()
        {
            return "Here be the index";
        }
        
        function loadplugman()
        {
            return "Here be plugin manager";
        }
        
    }