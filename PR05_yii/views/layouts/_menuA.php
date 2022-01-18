<?php 
return [
    ['label' => 'Inicio', 'url' => ['/site/index']],
    ['label' => 'Categorías', 'url' => ['/categorias']],
    ['label' => 'Entradas', 'url' => ['/entradas'],'items'=>[
        ['label' => 'Listado', 'url' => ['/entradas']],
        ['label' => 'Crear', 'url' => ['/entradas/create']],
    ]],

    ['label' => 'Usuarios', 'items'=>[
        ['label' => 'Listado','url' => ['/usuarios'] ],
        ['label' => 'Crear', 'url' => ['/usuarios/create']],
    ]]

];

