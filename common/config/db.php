<?php
return [
    'class' => 'yii\db\Connection',

    'dsn' => 'pgsql:host=localhost;port=5432;dbname=DB_analitics',
    'username' => 'postgres',
    'password' => '123456',
    'schemaMap' => [
        'pgsql' => [
            'class' => 'yii\db\pgsql\Schema',
            'defaultSchema' => 'public' //specify your schema here
        ]
    ],
    'charset' => 'utf8',
];