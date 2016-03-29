<?php
return [
    'log' => [
        'traceLevel' => YII_DEBUG ? 3 : 0,
        'targets' => [
            [
                'class' => 'yii\log\FileTarget',
                'levels' => ['error', 'warning'],
            ],
        ],
    ],
    'errorHandler' => [
        'errorAction' => 'site/error',
    ],
    'user' => [
        'identityClass' => 'app\modules\user\models\User',
        'enableAutoLogin' => true,
    ],
    'authManager' => [
        'class' => 'yii\rbac\DbManager',
    ],
    'cache' => [
        'class' => 'yii\caching\FileCache',
    ],
    'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false,
        'rules' => [
            'login' => 'site/login',
            '<module:\w+>/<controller:\w+>/<action:(\w|-)+>' => '<module>/<controller>/<action>',
            '<module:\w+>/<controller:\w+>/<action:(\w|-)+>/<id:\d+>' => '<module>/<controller>/<action>',
        ],
    ],
];