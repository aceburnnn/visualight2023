<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\test\models\Transaction $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="transaction-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'transaction_number')->textInput() ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'transaction_type')->textInput() ?>

    <?= $form->field($model, 'transaction_date')->textInput() ?>

    <?= $form->field($model, 'transaction_status')->textInput() ?>

    <?= $form->field($model, 'payment_method')->textInput() ?>

    <?= $form->field($model, 'payment_date')->textInput() ?>

    <?= $form->field($model, 'division')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
