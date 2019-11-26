<?php 
require 'banners.php' ;

if(!isset($_GET['id'])) 
    die("Error de id");

if($banner=click($_GET['id']))
    header('Location:'.$banner['url']);
else 
    header('Location:index.php');