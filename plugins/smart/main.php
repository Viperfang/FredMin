<?php

    class smart {

        function getName() {
            return "smart";
        }

        function getDescription() {
            return "SMART Disk Monitoring Solution";
        }

        function DependencyCheck() {
            return true; // No dep checks, no massiv config options, nothin!
        }

        function init() {
            return;
        }

        function getStats() {
            return array(); // Nope, none!
        }

        function getPages() {
            return array(
                // ID > icon name
                array('id'=>'smart','title'=>'SMART Information'),
            );
        }



        function loadPage($id)
        {
            switch($id)
            {
            case 'smart':
                return $this->content();
                return $this->smart();
                break;
            default: // If this runs, we got problems
                return "SMART module is not responsible for page '$id'";
                break;
            }
        }

        // Content
        function content() {
            ini_set('display_errors', 1);
        }

        // Smart Output
        function smart() {
            $cmd = shell_exec("sudo smartctl -i /dev/nvme0");
            $diskarray = array('sda','sdb','sdc','sdd','sde','sdf','nvme0');

                foreach ($diskarray as $diskheader) {
                    if (\strpos($cmd, 'START') !== true) {
                        $print = "
                        <h1>Disk: $diskheader</h1><br />
                        <div class='catout'>
                        $cmd
                        </div>
                        ";
                     echo $print;
                    }
                }
        }
    }
