<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\dbeditor\Models\TransactionStatus $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="transaction-status-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
