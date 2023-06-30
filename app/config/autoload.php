<?php

const FOLDERS = [
    'models',
    'repositories',
    'middlewares',
    'controllers',
    'routes'
];

spl_autoload_register(function (string $class) {
    foreach (FOLDERS as $folder) {
        $file = BASE_PATH . "/app/$folder/$class.php";
        if (file_exists($file)) {
            require_once $file;
        }
    }
});
