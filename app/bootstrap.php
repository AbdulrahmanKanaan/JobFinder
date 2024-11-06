<?php
    // load config
    require_once 'config/config.php';

    // Load Helpers
    require_once APPROOT . '/helpers/session_helper.php';
    require_once APPROOT . '/helpers/url_helper.php';

    // Load Libraries
    spl_autoload_register(function($className){
        require_once APPROOT . '/libraries/' . $className . '.php';
    });
?>