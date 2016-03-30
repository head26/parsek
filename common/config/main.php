<?php
use developeruz\db_rbac\behaviors\AccessBehavior;
$params = array_merge(
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app',
    'name' => 'Abs Analitics',
    'homeUrl' => '/',

    'basePath' => dirname(dirname(__DIR__)),
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'ru',
    //'controllerNamespace' => 'app\controllers',
    'defaultRoute' => 'main/default/index',
    //'controller' => 'site',
    'bootstrap' => ['log'],
    'as AccessBehavior' => [
        'class' => AccessBehavior::className(),
        'rules' => [
            'main/default' => [
                [
                    'actions' => ['index', 'error'],
                    'allow' => true,
                ],
            ],
            'user/default' => [
                [
                    'actions' => ['login', 'logout'],
                    'allow' => true,
                ],
            ],

        ],
    ],
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
        'user' => [
            'class' => 'app\modules\user\Module',
        ],
    ],
    'components' => require(__DIR__ . '/components.php'),
    'params' => $params,
];
