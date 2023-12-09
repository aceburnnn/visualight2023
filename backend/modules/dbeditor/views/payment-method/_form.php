<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\dbeditor\Models\PaymentMethod $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="payment-method-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'method_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'method')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
