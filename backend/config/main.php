<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [ //routes, if you cannot see your created route gamitin nyo this sa terminal oh my gosh "php yii cache/flush-all" without quote
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [

        'dbeditor' => [
            'class' => 'app\modules\dbeditor\Module',
        ],
        'test' => [ //aka transaction, si duke kasi test nilagay
            'class' => 'app\modules\dbeditor\Module',
        ],
        'gii' => [ //prevents users from accessing gii dev
            'class' => 'yii\gii\Module',
        ],
        'admin' => [
            'class' => 'mdm\admin\Module',
        ],
        'nmd' => [
            'class' => 'app\modules\nmd\Module',
        ],
        'predict' => [
            'class' => 'app\modules\predict\Module',
        ],
        'std' => [
            'class' => 'app\modules\std\Module',
        ],
        'chart' => [
            'class' => 'app\modules\chart\Module',
        ],
        'userprofile' => [
            'class' => 'common\modules\userprofile\Module',
        ],

    ],
    'components' => [
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',  // E.g., smtp.gmail.com for Gmail
                'username' => 'visualight2023@gmail.com',
                'password' => 'cudmndnxnwrgqzda',
                'port' => '465',  // Port for TLS
                'encryption' => 'ssl',  // Use 'tls' or 'ssl' based on your SMTP server
            ],
            'useFileTransport' => false, // Set this to false to send real emails
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
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
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            'authTimeout' => 1200,
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
            'class' => 'yii\web\Session',

        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'gii' => 'gii',
                'profile' => 'user-profile/view',
                'profile/update' => 'user-profile/update',
                'terms' => 'terms/terms/index',
                'site/success' => 'site/success',
                'dbeditor' => 'dbeditor/default/index',
                'assignment/view/<id:\d+>' => 'assignment/view',
                'chart/days' => 'nmd/chart/days',
                'chart/months' => 'nmd/chart/months',
                'chart/years' => 'nmd/chart/years',

                'chart/day' => 'std/chart/day',
                'chart/month' => 'std/chart/month',
                'chart/year' => 'std/chart/year',
                // '<controller:[\w-]+>/<id:\d+>' => '<controller>/view',
                // '<controller:[\w-]+>/<action:[\w-]+>/<id:\d+>' => '<controller>/<action>',
                // '<controller:[\w\-]+>/<action:[\w\-]+>/<id:[\w]+>' => '<controller>/<action>',
                // '<controller:[\w-]+>/<action:[\w-]+>' => '<controller>/<action>',
                // 'survey/survey-form' => 'survey/default/survey-form',

            ],
        ],
        'authManager' => [
            'class' => 'mdm\admin\components\DbManager',
            'itemTable' => 'auth_item',
            'itemChildTable' => 'auth_item_child',
            'assignmentTable' => 'auth_assignment',
            'ruleTable' => 'auth_rule',
        ],


    ],
    'params' => array_merge($params, [
        'fromDate' => '2023-01-01',
        'toDate' => '2023-12-31',
    ]),
];
?>