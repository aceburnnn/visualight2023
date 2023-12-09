<?php

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'admin' => [
                    'class' => 'mdm\admin\Module',
                  ],
        'chart' => [
                    'class' => 'app\modules\chart\Module',
                ],
       'userprofile' => [
                    'class' => 'common\modules\userprofile\Module',
                ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // Additional configuration options for the mailer component, e.g., 'transport', 'messageConfig', etc.
        ],
        'view' => [
            'class' => 'yii\web\View',
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@vendor/example/vendor-package/views',
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'frontend\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            'name' => 'advanced-frontend',
        ],
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
        // Set the default route to the login page
        'defaultRoute' => 'site/login',
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'create-predefined-user' => 'user/create-predefined-user',
                 'profile' => 'user-profile/view',
                'profile/update' => 'user-profile/update',
            ],
        ],
        'authManager' => [
            'class' => 'mdm\admin\components\DbManager',
            'itemTable' => 'auth_item',
            'itemChildTable' => 'auth_item_child',
            'assignmentTable' => 'auth_assignment',
            'ruleTable' => 'auth_rule',
        ],
        'controllerNamespace' => 'frontend\controllers',
    ],
    'params' => $params,
];

