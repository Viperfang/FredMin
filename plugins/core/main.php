<?php
    
    class core
    {
        private $plugman_saved = false;
        
        function getName()
        {
            return "Core";
        }
        
        function getDescription()
        {
            return "Provides index and plugin manager";
        }
        
        function DependencyCheck()
        {
            return true; // No dep checks, no massiv config options, nothin!
        }
        
        function init()
        {
            global $config, $errors;
            if(isset($_REQUEST['plugman-update']))
            {
                $newplugins = array();
                if(isset($_REQUEST['pm'])) $newplugins = array_keys($_REQUEST['pm']);
                if(array_search('core',$newplugins) === FALSE)
                {
                    array_push($newplugins,'core');
                    $errors[] = 'Forced enabling of core plugin: required for operation';
                }
                $approved_plugins = array();
                foreach($newplugins as $plugin)
                {
                    include_once("plugins/$plugin/main.php");
                    if((new $plugin())->DependencyCheck())
                        $approved_plugins[] = $plugin;
                    else
                        $errors[] = "Plugin activation failed: $plugin (Dependency check failed)";
                }
                $config['plugins_enabled'] = $approved_plugins;
                $this->plugman_saved = true;
            }
            return;
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
                return "Core module is not responsible for page '$id'";
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
                    $imgfile = "plugins/{$page['plugin']}/{$page['id']}.png";
                    if(!file_exists($imgfile)) $imgfile = 'images/defaulticon.png';
                    $content[] = "
            <div class='icon'>
                <a class='icon' href='?mod={$page['id']}'>
                <img class='icon' src='$imgfile'>
                <br /> {$page['title']} </a>
            </div>";
                }
            }
            
            return implode('',$content);
        }
        
        function loadplugman()
        {
            if($this->plugman_saved)
                return "<p>Changes have been saved</p>\n<p><a href=\"?\">Home</a></p>";
            
            global $plugins, $config;
            
            $allplugins = $plugins;
            
            $dirscan = scandir('plugins');
            unset($dirscan[1]); unset($dirscan[0]);
            foreach($dirscan as $pluginfile)
            {
                // Is this plugin inactive?
                if(!isset($plugins[$pluginfile]))
                {
                    if(!file_exists("plugins/$pluginfile/main.php"))
                    {
                        $errors[] = "Error prepareing $pluginfile, no main.php";
                        continue;
                    }
                    include("plugins/$pluginfile/main.php");
                    $allplugins[$pluginfile] = new $pluginfile();
                }
            }
            
            $pluginlist = array();
            ksort($allplugins);
            foreach($allplugins as $id => $plugin)
            {
                if(array_search($id, $config['plugins_enabled']) === FALSE)
                    $modchecked = "";
                else
                    $modchecked = " checked";
                $pluginlist[] = '<tr><td>'.
                    $plugin->getName().'</td><td>'.
                    $plugin->getDescription().'</td><td>'.
                    "<label for=\"chk$id\">Enabled</label>".
                    "<input id=\"chk$id\" type=\"checkbox\" name=\"pm[$id]\"$modchecked/></td></tr>";
            }
            
            $pluginlist = implode("\n\t\t",$pluginlist);
            $content = <<<EOC
    <form method="post">
    <table style="border: 1px black solid;">
        <tr><th>Name</th><th>Description</th><th>Control</th></tr>
        $pluginlist
    </table>
    <input type="submit" name="plugman-update" value="Save" />
    </form>
EOC;
            return $content;
        }
        
    }
