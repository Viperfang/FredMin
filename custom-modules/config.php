<?php

/*
    Documentation:
        To install a module into FredMin, you must copy the custom module to the
        'module' folder, then add a link to the run file.
            
            Example:
            custommenuitem(   
                'Test program',  //Icon Name
                'test-program/icon.png', //Path to Icon
                'test-program/test-program.php' //Path to run file
            );
*/

// Remote Updates Module
    custommenuitem(   
        'Test Program',
        'test-program/icon.png',
        'test-program/test-program.php'
    );
    
    custommenuitem(
        'Server Stats',
        'stats/icon.png',
        'stats/stats.php'
    );
    
    custommenuitem(
        'Rain Check',
        'raincheck/icon.png',
        'raincheck/raincheck.php'
        );
?>