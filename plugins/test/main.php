<?php
    
    class test
    {
        
        function getName()
        {
            return "Test";
        }
        
        function getDescription()
        {
            return "Dummy plugin for Plugin Manager Testing";
        }
        
        function DependencyCheck()
        {
            return false; // No dep checks, no massiv config options, nothin!
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
                array('id'=>'test','title'=>'Test Module'),
            );
        }
        
        function loadPage($id)
        {
            switch($id)
            {
            case 'test':
                return "Test module loaded";
                break;
            default: // If this runs, we got problems
                return "Test module is not responsible for page '$id'";
                break;
            }
        }
        
    }
