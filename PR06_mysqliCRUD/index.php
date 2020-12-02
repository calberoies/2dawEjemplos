<?php 
/** Ejemplo de CRUD con mysqli
 * 	
CREATE TABLE `productos` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `descripcion` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
 `precio` decimal(10,2) NOT NULL,
 `estado` enum('A','I') COLLATE utf8_spanish2_ci NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci
 */

require_once 'init.php';
require_once 'funcproductos.php';

$buscar=$_GET['buscar'] ?? '';
$estado=$_GET['estado'] ?? false;

$where='';
if($buscar)
    $where="where descripcion like '%".$db->escape_string($buscar)."%'";
if($estado){
    $where.=$where ? ' and ' : 'where ';
    $where.="estado='$estado'"; 
}
$order=$_GET['sort'] ?? 'id';

$sql = "SELECT * from productos $where order by $order";
//echo $sql;

$result = @mysqli_query($db, $sql);  //$db->query($sql);
if(!$result)
    die($db->error);

require 'vistas/index.php';