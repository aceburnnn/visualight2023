<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\test\models\TransactionSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="transaction-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'transaction_number') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'amount') ?>

    <?= $form->field($model, 'transaction_type') ?>

    <?php // echo $form->field($model, 'transaction_date') ?>

    <?php // echo $form->field($model, 'transaction_status') ?>

    <?php // echo $form->field($model, 'payment_method') ?>

    <?php // echo $form->field($model, 'payment_date') ?>

    <?php // echo $form->field($model, 'division') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
