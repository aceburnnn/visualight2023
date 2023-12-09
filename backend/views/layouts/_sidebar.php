<?php 
use mdm\admin\components\Helper;
?>

<style>
    .sidebar {
        position: relative;
        top: 0;
        left: 0;
        width: 280px;
        height: 100%;
        background-color: #f8f9fa;
        transition: left 0.3s ease;
    }

    .sidebar.hidden {
        left: -280px;
    }

    .toggle-btn {
        position: fixed;
        top: 10px;
        left: 240px;
        z-index: 999;
        width: 20px;
        height: 20px;
        background-color: blue;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 20px;
        border: none;
        cursor: pointer;
        transition: left 0.3s ease;
    }

    .toggle-btn.hidden {
        left: 10px;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.toggle-btn').click(function() {
            if ($('.sidebar').hasClass('hidden')) {
                $('.sidebar').removeClass('hidden');
                $('.toggle-btn').removeClass('hidden');
            } else {
                $('.sidebar').addClass('hidden');
                $('.toggle-btn').addClass('hidden');
            }
        });
    });
</script>

<div class="toggle-btn">-</div>

<aside class="sidebar">
    <?php echo \yii\bootstrap5\Nav::widget([
        'options' => [
            'class' => 'd-flex flex-column nav-pills'
        ],
        'items' => [
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
            [
                'label' => 'Profile',
                // 'url'   => ['/admin/route/index'],
            ],
            [
                'label' => 'Dashboard',
                // 'url'   => ['/admin/route/index'],
            ],
            [
                'label' => 'Division Charts',
                'icon' => 'user',
                'items' => [
                    [
                        'label' => 'National Metrology',
                        // 'url'   => ['/admin/user/index'],
                        // 'active' => Yii::$app->controller->id == 'user',
                    ],
                    [
                        'label' => 'Standards and Testing',
                        // 'url'   => ['/admin/assignment/index'],
                        // 'active' => Yii::$app->controller->id == 'assignment',
                    ],
                    [
                        'label' => 'Technical Services',
                        // 'url'   => ['/admin/role/index'],
                        // 'active' => Yii::$app->controller->id == 'role',
                    ],
                ],
            ],
        ],
    ]) 
    ?>
</aside>
