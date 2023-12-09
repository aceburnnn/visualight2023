<?php

use app\modules\dbeditor\Models\TransactionStatus;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\dbeditor\Models\TransactionStatusSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Transaction Statuses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-status-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Transaction Status', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'status_code',
            'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TransactionStatus $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
