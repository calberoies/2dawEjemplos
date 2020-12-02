<?php

$banners=[
	'audi'=>['html'=>'<img width=100% src="img/audi.jpg"><br>AUDI','url'=>'http://www.audi.com'],
	'apple'=>['html'=>'<img width=100% src="img/apple.png"><br>Apple','url'=>'http://www.apple.com'],
	'cocacola'=>['html'=>'<img width=100% src="img/cocacola.png"><br>Bebe Cocacola','url'=>'http://www.cocacola.com'],
	];

/** 
 * 
 * Muestra un banner aleatorio
 */
function getbanner(){
	
	global $banners;
	static $claves;
	if(!$claves) { //La primera vez, desordeno
		$claves=array_keys($banners);
		shuffle($claves);
	}
	$clave=array_pop($claves);

	//Otra forma 
	//$n=mt_rand(0,count($banners)-1);
	//$banner=$banners[$claves[$n]];
	
	$banner=$banners[$clave];
	
	return "<a href='click.php?id=$clave'>$banner[html]</a>";
	
//	return sprintf("<a href='click.php?id=%s'>%s</a>",
//			$clave,$banner['html']);
	
}