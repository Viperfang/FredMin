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
            return array('index','plugman');
        }
        
        function loadPage($id)
        {
            switch($id)
            {
            case 'index':
                return array('title'=>'Index','content'=>$this->loadindex());
                break;
            case 'plugman':
                return array('title'=>'Plugin Manager','content'=>$this->loadplugman());
                break;
            default:
                return array('Invalid page',"Core module does is not responsible for page '$id'");
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