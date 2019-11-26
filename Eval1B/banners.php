<?php 
require_once 'init.php';



/** Devuelve el c�digo html de un banner seleccionado al azar (titulo y html de la tabla)
*  Ejemplo de uso en cualquier parte de la p�gina:  echo getbanner();
*/
function getbanner(){
    global $db;
    static $ids; //ids de los banners, desordenados

    if(!$ids){
        $ids= $db->query("SELECT id FROM banners")->fetchAll(PDO::FETCH_COLUMN);
        
        /* Alternativa 
        $ids=[];
        foreach ($db->query("SELECT id FROM banners")->fetchAll() as $r)
            $ids[]=$r['id'];*/

        shuffle($ids);
    }
    $id=array_pop($ids);    
    if(!$id) return null; //No quedan banners!!

    $banner=$db->query("SELECT * FROM banners where id=".$id)->fetch();
    return "<a href='click.php?id=$id'>$banner[titulo]</a>
        <hr>
        $banner[html]";
}

// Registra un click y devuelve el banner asociado
function click($id){
    global $db;
    $banner=$db->query("SELECT * FROM banners where id=".$db->quote($id))->fetch();
    if(!$banner) return null;

    $query=$db->prepare("insert into banner_clics (fecha,banners_id) values (:fecha,:id)");
    $query->execute([':fecha'=>date('Y-m-d'), ':id'=>$id]);
    return $banner;
}