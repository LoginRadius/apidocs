<?php

class pluginsLoader {

    /**
     * __construct call on class call
     */
    function __construct() {
        $this->include_subplugin();
    }

    /**
     * Including plugins files
     */
    function include_subplugin() {
        $dirs = glob(PLUGIN_DIR . '*', GLOB_ONLYDIR);
        $loadPlugins = array();
        foreach ($dirs as $dir) {
            $pluginConfig = $this->get_config_file($dir);
            if ($pluginConfig) {
                $loadPlugins[] = json_decode($pluginConfig);
            }
        }

        usort($loadPlugins, array($this, 'custom_sort'));
        foreach ($loadPlugins as $loadPlugin) {
            if (!empty($loadPlugin)) {
                if(isset($loadPlugin->isActive) && $loadPlugin->isActive == true){
                    include_once PLUGIN_DIR . $loadPlugin->load;
                }
            }
        }
    }

    /**
     * Sort plugin by weight
     * 
     * @param type $a
     * @param type $b
     * @return type
     */
    function custom_sort($a, $b) {
        return $a->weight < $b->weight ? -1 : 1; //Compare the scores
    }

    /**
     * Get plugin.json file content
     * @param type $dirName
     * @return type
     */
    function get_config_file($dirName) {
        if (file_exists($dirName . '/config.json')) {
            $config = file_get_contents($dirName . '/config.json');
            if ($config != false) {
                return $config;
            }
        }
        return false;
    }

}

new pluginsLoader();
