<?php

/* @var $this yii\web\View */
/* @var $model common\models\User */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->registerCssFile(Url::to(['/css/custom.css']));

?>

<head><link href="path/to/font-awesome/css/all.min.css" rel="stylesheet">
 </head>
<div class="user-update" style = " background: white; padding: 1rem; border-radius: 20px; box-shadow: -4px 4px 8px rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.25);">
    <h2 style = "padding-bottom: 10px; color: #0362BA;"> Update User </h2>

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'fullName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 4]) ?>

    <?= $form->field($model, 'contactNumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([
        $model::STATUS_ACTIVE => 'Active',
        $model::STATUS_INACTIVE => 'Inactive',
        $model::STATUS_EMAIL_NOT_VERIFIED => 'Email Not Verified',
    ]) ?>
    <?php if ($model->hasErrors('status')): ?>
        <div class="alert alert-danger"><?= $model->getFirstError('status') ?></div>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-warning']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
