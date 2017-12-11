<?php

/* Plugin Name: Multisite Active Plugins Check
 * Description: Check active plugins on multisite, this plugin should be network activated
 * Version:     0.1
 */


add_filter('active_plugins', function($active_plugins){
    if (is_multisite()){
        $active_network_plugins = get_site_option('active_sitewide_plugins',array());
        foreach ($active_network_plugins as $key => $value){
            if (!in_array($key, $active_plugins)){
                $active_plugins[] = $key;
            }
        }
    }
    return $active_plugins;
});

