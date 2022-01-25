<?php
return  [
['class' => 'yii\rest\UrlRule',
    'pluralize'=>false,
    'controller' => ['productos','entradas','categorias','usuarios'],
],
['class' => 'yii\rest\UrlRule',
    'controller' => ['user'],
    'pluralize'=>false,
    'extraPatterns'=>['POST authenticate'=>'authenticate']
],
['class' => 'yii\rest\UrlRule',
    'controller' => ['entradas'],
    'pluralize'=>false,
    'extraPatterns'=>['PUT aprobar'=>'aprobar']
]

 
];