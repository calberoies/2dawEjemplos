<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=www.iesfsl.org;dbname=test_blog',
    'username' => '2daw',
    'password' => 'iesfsl',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 60,
    'schemaCache' => 'cache',
];
