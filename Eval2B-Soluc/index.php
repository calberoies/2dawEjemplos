<?php 
require 'init.php';

/*$viajes=$db->query('select viajes.id,destino,fecha,plazas,
    count(*) libres from viajes left join asientos on viajes_id=viajes.id and ocupado=0 
    group by 1,2,3,4 order by fecha')->fetchAll();*/

$viajes=$db->query('select id,destino,fecha,plazas,
    (select count(*)  from asientos where viajes_id=v.id and ocupado=0) libres 
    from viajes v order by fecha')->fetchAll();


require 'views/index.php';

