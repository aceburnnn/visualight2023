<?php

use mdm\admin\components\Helper;
use yii\bootstrap5\Html;
use yii\helpers\Url;


$userName = Yii::$app->user->isGuest ? 'Guest' : ucfirst(Yii::$app->user->identity->username);
$userRole = Yii::$app->authManager->getRolesByUser(Yii::$app->user->id);

// Assuming a user can have only one role (modify this part as needed).
$userRoleName = isset($userRole) && !empty($userRole) ? reset($userRole)->name : 'Guest';
$userName = ucfirst($userName); // Convert the first letter to uppercase.

$userId = Yii::$app->user->id;
$model = \common\models\UserProfile::findOne(['id' => $userId]);

$defaultImagePath = Yii::getAlias('@web') . '/images/user2.jpg';



?>

<style>

.pf{
        object-fit: cover;
    }

</style>

<!-- <nav style="position: fixed; top: 0; height: 100%;"> -->
<aside class="fixed-top main-sidebar sidebar-dark-primary elevation-4" style="background-color: #2A2C2F;">
    <!-- Brand Logo -->
    <div class="brand-link">
        <img src="/images/logo2.png" alt="Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">DOST-ITDI</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-0 mb-0 d-flex" style="margin-left: -3px;">
            <div class="image" style="padding-left: 10px;">
                <!-- Show the user's profile picture -->
                <?php
                if ($model && $model->profile_picture) {
                    $profilePicturePath = Url::to(['/user-profile/get-profile-picture', 'fileName' => $model->profile_picture]);
                    echo Html::img($profilePicturePath, ['class' => 'pf img-circle elevation-2', 'style' => 'height: 50px; width: 50px;']);
                } else {
                    echo Html::img($defaultImagePath, ['class' => 'pf img-circle elevation-2', 'style' => 'height: 50px; width: 50px;']);
                }
                ?>
            </div>
            <div class="info d-flex flex-column justify-content-between ml-2">
                <div>
                    <a href="/profile" class="d-block"> <?= Html::encode($userName) ?> </a>
                </div>
                <div>
                    <p style="color: #F8B200; font-size: 14px;"> <?= Html::encode($userRoleName) ?> </p> <!-- Display the user's role with yellow text color -->
                </div>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo hail812\adminlte\widgets\Menu::widget([
                'items' => [

                    ['label' => 'logout', 'url' => ['site/logout'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    // ['label' => 'CUSTOM', 'header' => true, 'visible' => Helper::checkRoute('/admin/index'),], kung may maisip kayo ilagay palitan nyo yun CUSTOM

                    [
                        'label' => 'Database Editor',
                        'icon' => 'fas fa-database',
                        'visible' => Yii::$app->user->can('ADMIN'),
                        'items' => [
                            [
                                'label' => 'Query',
                                'icon' => 'fas fa-search',
                                'url' => ['/dbeditor/query'],
                                'visible' => Yii::$app->user->can('dbQuery'),
                                'active' => Yii::$app->controller->getUniqueID() === 'dbeditor/query',

                            ],
                            [
                                'label' => 'Customer',
                                'icon' => 'fas fa-users',
                                'url' => ['/dbeditor/customer'],
                                'visible' => Yii::$app->user->can('Customer_Permission'),
                                'active' => Yii::$app->controller->getUniqueID() === 'dbeditor/customer',

                            ],
                            [
                                'label' => 'Customer Type',
                                'icon' => '	fas fa-user-check',
                                'url'   => ['/dbeditor/customer-type'],
                                'visible' => Yii::$app->user->can('CustomerType_Permission'),
                                'active' => Yii::$app->controller->getUniqueID() === 'dbeditor/customer-type',
                            ],
                            [
                                'label' => 'Division',
                                'icon' => '	fas fa-building	',
                                'url'   => ['/dbeditor/division'],
                                'visible' => Yii::$app->user->can('Division_Permission'),
                                'active' => Yii::$app->controller->getUniqueID() === 'dbeditor/division',
                            ],
                            [
                                'label' => 'Payment Method',
                                'icon' => '	fas fa-money-bill-wave	',
                                'url'   => ['/dbeditor/payment-method'],
                                'visible' => Yii::$app->user->can('PaymentMethod_Permission'),
                                'active' => Yii::$app->controller->getUniqueID() === 'dbeditor/payment-method',
                            ],
                            [
                                'label' => 'Transactions',
                                'icon' => 'fas fa-book	',
                                'url'   => ['/dbeditor/transaction'],
                                'visible' => Yii::$app->user->can('Transaction_Permission'),
                                'active' => Yii::$app->controller->getUniqueID() === 'dbeditor/transaction',
                            ],
                            [
                                'label' => 'Transaction Status',
                                'icon' => 'fas fa-check-circle',
                                'url'   => ['/dbeditor/transaction-status'],
                                'visible' => Yii::$app->user->can('TransactionStatus_Permission'),
                                'active' => Yii::$app->controller->getUniqueID() === 'dbeditor/transaction-status',
                            ],
                            [
                                'label' => 'Transaction Type',
                                'icon' => 'fas fa-tasks',
                                'url'   => ['/dbeditor/transaction-type'],
                                'visible' => Yii::$app->user->can('TransactionType_Permission'),
                                'active' => Yii::$app->controller->getUniqueID() === 'dbeditor/transaction-type',
                            ],
                        ],
                    ],

                    [
                        'label' => 'Accounts',
                        'icon' => 'user',
                        'visible' => Yii::$app->user->can('ADMIN'),
                        'items' => [
                            [
                                'label' => 'User',
                                'icon' => 'fas fa-user-circle',
                                'url' => ['/user/index'],
                                'active' => Yii::$app->controller->route === 'user/index',
                                'visible' => Yii::$app->user->can('canCreateUser')
                            ],
                            [
                                'label' => 'Assignment',
                                'icon' => 'fas fa-address-book',
                                'url'   => ['/admin/assignment/index'],
                                'active' => Yii::$app->controller->id === 'assignment',
                                'visible' => Yii::$app->user->can('canAssignRole')
                            ],
                            [
                                'label' => 'Role',
                                'icon' => 'fas fa-eye',
                                'url'   => ['/admin/role/index'],
                                'active' => Yii::$app->controller->id === 'role',
                                'visible' => Yii::$app->user->can('canCreateRole')
                            ],
                            [
                                'label' => 'Permission',
                                'icon' => 'fas fa-check-square	',
                                'url'   => ['/admin/permission/index'],
                                'active' => Yii::$app->controller->id === 'permission',
                                 'visible' => Yii::$app->user->can('canPermit')
                            ],
                            [
                                'label' => 'Route',
                                'icon' => 'fas fa-route	',
                                'url'   => ['/admin/route/index'],
                                'active' => Yii::$app->controller->id === 'route',
                                'visible' => Yii::$app->user->can('canRoute')
                            ],
                        ],
                    ],

                    // ['label' => 'ChartJS', 'header' => true, 'visible' => Helper::checkRoute('/chart/chart/index'),],
                    // ['label' => 'Chart',  'icon' => 'star', 'url' => ['/chart/chart/index'], 'visible' => Helper::checkRoute('/chart/chart/index'),],
                    ['label' => 'Resend Email Verification',  'icon' => 'fas fa-share', 'url' => ["/user/send-verification-code"], 'visible' => Yii::$app->user->can('canResendEmailVerification'),],
                    ['label' => 'Send PDF',  'icon' => 'star', 'url' => ["/site/upload-pdf"], 'visible' => Yii::$app->user->can('canSendPDF') ],
                    ['label' => 'Dashboard',  'icon' => 'fas fa-chalkboard', 'url' => ["/site/index"], 'visible' => Helper::checkRoute('/site/index'),],                    
                    [
                        'label' => 'Division Charts',
                        'icon' => '	fas fa-chart-area',
                        'visible' => Helper::checkRoute('/site/index'),
                        'items' => [
                            [
                                'label' => 'Predict Chart',
                                'icon' => 'fas fa-chart-bar',
                                'url' => ['/predict/chart/index'],
                                'visible' => Helper::checkRoute('/predict/chart/index'),
                                'active' => Yii::$app->controller->route === 'predict/chart/index',
                            ],
                                [
                                'label' => 'National Metrology',
                                'icon' => 'fas fa-chart-pie	',
                                'url' => ['/nmd/chart/index'],
                                'visible' => Helper::checkRoute('/nmd/chart/index'),
                                'active' => Yii::$app->controller->route === 'nmd/chart/index',

                            ],
                            [
                                'label' => 'Standard and Testing',
                                'icon' => 'fas fa-chart-line',
                                'url' => ['/std/chart/index'],
                                'visible' => Helper::checkRoute('/std/chart/index'),
                                'active' => Yii::$app->controller->route === 'std/chart/index',

                            ],
                        ],
                    ],
                    
                       ['label' => 'Terms of Service',  'icon' => 'fas fa-file-contract', 'url' => ["/terms/index"], 'visible' => Helper::checkRoute('/terms/index')],
                    // ['label' => 'Survey',  'icon' => 'fas fa-chalkboard', 'url' => ["/survey/index"], 'visible' => Helper::checkRoute('/site/index'), 'visible' => Helper::checkRoute('/site/index'),],


                ],
            ]);
            ?>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- </nav> -->