<?php
    
    $activepage = 'index';
    $tokens = array('ERROR'=>'');
    $errors = array();
    
    // Read config, and fail to defaults
    if(file_exists('config.json'))
    {
        $config = (array) json_decode(file_get_contents('config.json'));
    }
    else 
    {
        // no config file? Don't panic, load the plugin manager and load it
        // to trigger a plugin load.
        $config = array(
            'plugins_enabled' => array('core'),
            'stats' => array(),
            'branding'=>'FredMin'
        );
       file_put_contents('config.json', json_encode($config));
       $activepage = 'plugman';
       $errors[] = "Failed to find config, defaults reloaded. Run Plugin Manager to begin.";
    }
    
    // Apply branding
    $tokens['BRANDING'] = $config['branding'];
    
    // load all enabled plugins
    $plugins = array();
    $statindex = array();
    $pageindex = array();
    foreach($config['plugins_enabled'] as $plugin)
    {
        if(!file_exists("plugins/$plugin/main.php"))
        {
            $errors[] = "Plugin load failed: File not found: $plugin";
            continue;
        }
        include("plugins/$plugin/main.php");
        $plugins[$plugin] = new $plugin();
        $plugins[$plugin]->init();
        foreach($plugins[$plugin]->getStats() as $stat)
            $statindex[$stat] = $plugin;
        foreach($plugins[$plugin]->getPages() as $page)
        {
            $pageindex[$page['id']] = $page;
            $pageindex[$page['id']]['plugin'] = $plugin;
        }
    }
    
    // validate active page
    if(isset($_REQUEST['mod']))
    {
        if(isset($pageindex[$_REQUEST['mod']]))
        {
            $activepage = $_REQUEST['mod'];
        }
        else
        {
            $errors[] = "Attempted to load non-existant module as active page: {$_REQUEST['mod']}, returned to index";
        }
    }
    
    // load stats TODO: gonna need titles and sub stats, eg: services
    $statlist = array('Stats SOON!');
    foreach($config['stats'] as $stat)
    {
        
    }
    $tokens['STATS'] = implode("\n", $statlist);
    
    // load content
    $tokens['CONTENT'] = "Failed to load content, $activepage was not claimed by a plugin!";
    $tokens['TITLE'] = $activepage;
    if(isset($pageindex[$activepage]))
    {
        $tokens['CONTENT'] = $plugins[$pageindex[$activepage]['plugin']]->loadPage($activepage);
        $tokens['TITLE'] = $pageindex[$activepage]['title'];
    }
    
    // DEBUG
    //$tokens['CONTENT'] .= print_r($pageindex,true);
    
    // load template
    $page = file_get_contents('template.html');
    
    // Merge errors into paragraphs and add to tokens
    if(count($errors) > 0) $tokens['ERROR'] = '<p>'.implode('</p><p>',$errors).'</p>';
    
    // build final page
    foreach($tokens as $token => $data) $page = str_replace("%$token%",$data,$page);
    
    // write to browser
    echo $page;
    
    // update config if required.
    if($config != (array) json_decode(file_get_contents('config.json')))
        file_put_contents('config.json', json_encode($config));
    
?>