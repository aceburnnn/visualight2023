<?php

/* @var $this yii\web\View */
/* @var $model common\models\User */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->registerCssFile(Url::to(['/css/custom.css']));


$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'User List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <head><link href="path/to/font-awesome/css/all.min.css" rel="stylesheet">
 </head>
<div class="user-create">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fullName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contactNumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'newPassword')->passwordInput(['maxlength' => true])->label('Password') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
