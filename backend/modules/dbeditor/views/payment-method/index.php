<?php

use app\modules\dbeditor\Models\PaymentMethod;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\dbeditor\Models\PaymentMethodSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Payment Methods';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-method-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Payment Method', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'method_code',
            'method',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PaymentMethod $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
