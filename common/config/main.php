<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    // 'modules' => [
    //     'admin' => [
    //         'class' => 'mdm\admin\Module',
    //     ]
    // ],
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@vendor/hail812/yii2-adminlte3/src/views',
                ],
            ],
        ],
        'authManager' => [
            'class' => 'mdm\admin\components\DbManager', // Removed the extra comma (,) after the class definition
            'db' => 'db_rbac',

        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
            'class' => 'yii\web\Session',

        ],
        'user' => [
            'identityClass' => 'mdm\admin\models\User',
            'class' => 'yii\web\User',
            // 'loginUrl' => ['site/login'],
        ],
        'urlManager' => [
            'rules' => [
                'create-predefined-user' => 'user/create-predefined-user',
                'profile' => 'userprofile/profile/view',
                'profile/update' => 'userprofile/profile/update',
                'settings' => 'userprofile/settings/view',
                'settings/update' => 'userprofile/settings/update',
                'assignment/view/<id:\d+>' => 'assignment/view',
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',  // E.g., smtp.gmail.com for Gmail
                'username' => 'visualight2023@gmail.com',
                'password' => 'cudmndnxnwrgqzda',
                'port' => '465',  // Port for TLS
                'encryption' => 'tls',  // Use 'tls' or 'ssl' based on your SMTP server
            ],
            'useFileTransport' => false, // Set this to false to send real emails
        ],
        'defaultRoute' => 'site/login',
        'controllerNamespace' => 'backend\controllers',
    ],
];
