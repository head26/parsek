<?php
use developeruz\db_rbac\behaviors\AccessBehavior;
$params = array_merge(
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app',
    'name' => 'Abs Analitics',

    'basePath' => dirname(dirname(__DIR__)),
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'ru',
    //'controllerNamespace' => 'app\controllers',
    //'defaultRoute' => 'site/login',
    //'controller' => 'site',
    'bootstrap' => ['log'],
    /*'as AccessBehavior' => [
        'class' => AccessBehavior::className(),
        'rules' => [
            'site' => [
                [
                    'actions' => ['login', 'index', 'logout', 'error'],
                    'allow' => true,
                ],
            ],
        ],
    ],*/
    'modules' => [
        'permit' => [
            'class' => 'developeruz\db_rbac\Yii2DbRbac',
            'params' => [
                'userClass' => 'app\modules\user\models\User',
            ],
        ],
        'main' => [
            'class' => 'app\modules\main\Module',
        ],
        'modules' => [
            'user' => [
                'class' => 'app\modules\user\Module',
            ],
        ],
    ],
    'components' => require(__DIR__ . '/components.php'),
    'params' => $params,
];
