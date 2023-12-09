<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Resend Email Verification';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile(Url::to(['/css/custom.css']));
?>

<style>
    body {
        background-color: #f8f9fa;
        margin: 0;
        font-family: 'Arial', sans-serif;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin-top: -200px;
    }

    .user-create {
        background: #ffffff;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        max-width: 1000px; /* Adjusted max-width */
        width: 100%;
        margin: auto;
        text-align: center;
    }

    h2 {
        color: #3498db;
        font-size: 2em;
        margin-bottom: 20px;
    }

    .alert {
        margin-top: 20px;
        padding: 15px;
        border-radius: 8px;
        font-size: 1.1em;
        font-weight: bold;
    }

    .alert-success {
        background-color: #2ecc71;
        border-color: #27ae60;
        color: #ffffff;
    }

    .alert-danger {
        background-color: #e74c3c;
        border-color: #c0392b;
        color: #ffffff;
    }

    .alert-info {
        background-color: #3498db;
        border-color: #2980b9;
        color: #ffffff;
    }

    label {
        color: #34495e;
        text-align: left;
        display: block;
        margin-bottom: 5px; /* Optional: Add some spacing between label and input */
    }

    .form-group {
        margin-top: 20px;
        text-align:right;
    }

    .btn-primary {
        background-color: #3498db;
        border-color: #2980b9;
        padding: 12px 25px;
        font-size: 1.2em;
        border-radius: 8px;
        transition: background-color 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background-color: #2980b9;
        border-color: #3498db;
    }

    .btn-primary:focus {
        outline: none;
    }
    
</style>

<div class="container">
    <div class="user-create">
      

        <h2>Resend Email Verification</h2>

        <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success">
                <?= Yii::$app->session->getFlash('success') ?>
            </div>
        <?php elseif (Yii::$app->session->hasFlash('error')): ?>
            <div class="alert alert-danger">
                <?= Yii::$app->session->getFlash('error') ?>
            </div>
        <?php elseif (Yii::$app->session->hasFlash('info')): ?>
            <div class="alert alert-info">
                <?= Yii::$app->session->getFlash('info') ?>
            </div>
        <?php endif; ?>

        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>

        <div class="form-group">
            <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<?php
$js = <<< JS
    // Remove flash message after 5 seconds (adjust the time as needed)
    setTimeout(function() {
        $('.alert').fadeOut('slow', function() {
            $(this).remove();
        });
    }, 2000);
JS;

$this->registerJs($js);
?>
