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
                array('id'=>'plugman','title'=>'Plugin Manager','group'=>'Maintenance')
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
            global $pageindex;
            $graph = array();
            $content = array();
            
            foreach($pageindex as $page)
            {
                if(isset($page['hidden'])) continue;
                if(!isset($page['group'])) $page['group'] = 'Other';
                if(!isset($graph[$page['group']])) $graph[$page['group']] = array();
                $graph[$page['group']][$page['title']] = $page;
            }
            
            ksort($graph);
            foreach(array_keys($graph) as $key)
            {
                ksort($graph[$key]);
                $content[] = "<p class='menu-header'>$key</p><br />\n";
                foreach($graph[$key] as $page)
                {
                    $content[] = "
            <div class='icon'>
                <a class='icon' href='?mod={$page['id']}'>
                <img class='icon' src='plugins/{$page['plugin']}/{$page['id']}.png'>
                <br /> {$page['title']} </a>
            </div>";
                }
            }
            
            return implode('',$content);
        }
        
        function loadplugman()
        {
            return "Here be plugin manager";
        }
        
    }