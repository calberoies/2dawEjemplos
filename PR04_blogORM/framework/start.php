<?php 

spl_autoload_register(function($class){
    foreach(['framework','controllers','models','views'] as $dir){
        $file=$dir.'/'.$class.'.php';
        if(file_exists($file)) {
            require $file;
        }
    }
});

session_start();
