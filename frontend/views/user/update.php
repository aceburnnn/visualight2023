<?php

/* @var $this yii\web\View */
/* @var $model common\models\User */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->registerCssFile(Url::to(['/css/custom.css']));


$this->title = 'Update User: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'User List', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<head><link href="path/to/font-awesome/css/all.min.css" rel="stylesheet">
 </head>
<div class="user-update">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'fullName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contactNumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'existingPassword')->passwordInput() ?>

    <?= $form->field($model, 'newPassword')->passwordInput() ?>

    <?= $form->field($model, 'status')->dropDownList([
        $model::STATUS_ACTIVE => 'Active',
        $model::STATUS_INACTIVE => 'Inactive',
        $model::STATUS_DELETED => 'Deleted',
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
