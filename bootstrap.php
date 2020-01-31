<?php
require_once 'config.php';

spl_autoload_register(
    function($className){
        $rootPath = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR;
        $filePath = str_replace('\\',DIRECTORY_SEPARATOR,$className);

        require_once($rootPath.$filePath.'.php');
    }
);

require_once 'route.php';
