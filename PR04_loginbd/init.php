<?php 
 spl_autoload_register(function($clase){
     foreach(['.','models'] as $dir) {
        $file=$dir.'/'.$clase.'.php';
        if(file_exists($file))
            require $file;
     }
 });

 session_start();
 if(!isset($_SESSION['app']))
    $_SESSION['app']=new App;
 $app=$_SESSION['app'];
 $app->start();

 
 