<!-- <?php 


use backend\assets\AppAsset;
use common\widgets\Alert;
use mdm\admin\components\Helper;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;


?>

<?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        
         [
                        'label' => 'RBAC',
                        'url' => ['/admin/index'],
                        'icon' => 'user',
                        'visible' => Helper::checkRoute('/admin/index'),
                        'items' => [
                            [
                                'label' => 'User',
                                'url'   => ['/admin/user/index'],
                                'active' => Yii::$app->controller->id == 'user',
                            ],
                            [
                                'label' => 'Assignment',
                                'url'   => ['/admin/assignment/index'],
                                'active' => Yii::$app->controller->id == 'assignment',
                            ],
                            [
                                'label' => 'Role',
                                'url'   => ['/admin/role/index'],
                                'active' => Yii::$app->controller->id == 'role',
                            ],
                            [
                                'label' => 'Permission',
                                'url'   => ['/admin/permission/index'],
                                'active' => Yii::$app->controller->id == 'permission',
                            ],
                            [
                                'label' => 'Rule',
                                'url'   => ['/admin/rule/index'],
                                'active' => Yii::$app->controller->id == 'rule',
                            ],
                            [
                                'label' => 'Route',
                                'url'   => ['/admin/route/index'],
                                'active' => Yii::$app->controller->id == 'route',
                            ],
                        ],
                    ],

    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    }     
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
        'items' => $menuItems,
    ]);
    if (Yii::$app->user->isGuest) {
        echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
    } else {
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout text-decoration-none']
            )
            . Html::endForm();
    }
    NavBar::end();
    ?>