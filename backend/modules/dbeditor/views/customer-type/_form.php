<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\dbeditor\Models\CustomerType $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="customer-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
