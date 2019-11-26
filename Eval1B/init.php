<?php 
// Conecta a la base de datos
$host='www.iesfsl.org';
$dbname='test_db';
$user='2dawdb';
$pass='iesfsl';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e)   {
    die ("Error al conectar: " . $e->getMessage());
}
