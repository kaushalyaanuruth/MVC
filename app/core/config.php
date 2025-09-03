<?php 

spl_autoload_register(function ($class) {
    $file = "../app/models/" . ucfirst($class) . ".php";
    if (file_exists($file)) {
        require $file;
    }
});

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'mvc');
define('DB_USER', 'root');
define('DB_PASS', '');

define('ROOT', 'http://localhost/MVC/public');