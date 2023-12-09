<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use common\models\User;
use yii\helpers\Html;
use yii\grid\GridView;

// $this->registerCssFile(Yii::$app->request->baseUrl . '/css/user-index.css');

$this->title = 'Users';

?>
<div class="user-index">

    <!-- Create User button -->
    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'attribute' => 'id',
            'headerOptions' => ['class' => 'bg-blue', 'style' => 'color: white; text-align: center;'],
            'contentOptions' => ['style' => 'text-align: center; background-color: white;'],
        ],
        [
            'attribute' => 'username',
            'headerOptions' => ['class' => 'bg-blue', 'style' => 'color: white; text-align: center;'],
            'contentOptions' => ['style' => 'text-align: center; background-color: white;'],
        ],
        [
            'attribute' => 'email',
            'headerOptions' => ['class' => 'bg-blue', 'style' => 'color: white; text-align: center;'],
            'contentOptions' => ['style' => 'text-align: center; background-color: white;'],
        ],
        [
            'attribute' => 'status',
            'headerOptions' => ['class' => 'bg-blue', 'style' => 'color: white; text-align: center;'],
            'contentOptions' => ['style' => 'text-align: center; background-color: white;'],
            'value' => function ($model) {
                return $model->getStatusLabel();
            },
            'filter' => User::getStatusOptions(),
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Actions',
            'headerOptions' => ['class' => 'bg-blue', 'style' => 'color: white; text-align: center;'],
            'contentOptions' => ['style' => 'text-align: center; background: white;'],
            'template' => '{view} {update} {delete}', // Remove the button icons and use only text
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    return Html::a('View', ['view', 'id' => $model->id], ['class' => 'btn btn-primary']);
                },
                'update' => function ($url, $model, $key) {
                    return Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-info']);
                },
                'delete' => function ($url, $model, $key) {
                    return Html::a('Delete', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]);
                },
            ],
        ],
    ],
]); ?>


</div>
