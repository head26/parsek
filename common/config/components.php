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
        'errorAction' => 'main/default/error',
    ],
    'user' => [
        'identityClass' => 'app\modules\user\models\User',
        'enableAutoLogin' => true,
        'loginUrl' => [ 'user/default/login' ],
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
            '' => 'main/default/index',
            '<_a:error>' => 'main/default/<_a>',
            '<_a:(login|logout)>' => 'user/default/<_a>',


            '<_m:user>/<id:\d+>' => '<_m>/default/view',
            '<_m:user>/<id:\d+>/<_a:[\w\-]+>' => '<_m>/default/<_a>',
            '<_m:user>' => '<_m>/default/index',

            '<_m:[\w\-]+>/<_c:default>/<id:\d+>' => '<_m>/view',
            '<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>' => '<_m>/<_c>/view',
            '<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>/<_a:[\w\-]+>' => '<_m>/<_c>/<_a>',
            '<_m:[\w\-]+>' => '<_m>/default/index',
            '<_m:[\w\-]+>/<_c:[\w\-]+>' => '<_m>/<_c>/index',

            /*'<module:\w+>/<controller:\w+>/<action:(\w|-)+>' => '<module>/<controller>/<action>',
            '<module:\w+>/<controller:\w+>/<action:(\w|-)+>/<id:\d+>' => '<module>/<controller>/<action>',*/
        ],
    ],
];