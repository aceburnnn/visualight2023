<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Forgot Password';

?>
<style>

    body{
        background-color: #2A2C2F;
    }
</style>


<div class="site-forgot-password" style="display: flex; justify-content: center; align-items: center; height: 100vh; margin-top: -55px; background-color: #2A2C2F;">
    <div style="width: 500px; background: white; padding: 1rem; border-radius: 20px; box-shadow: -4px 4px 8px rgba(0, 0, 0, 0.7), 0 6px 20px 0 rgba(0, 0, 0, 0.25);">

        <h1><?= Html::encode($this->title) ?></h1>
        <p>Please enter your email. A link to reset your password will be sent there.</p>

        <?php $form = ActiveForm::begin(['id' => 'forgot-password-form']); ?>
            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
                <?php if (Yii::$app->session->hasFlash('error')): ?>
                    <div class="alert alert-danger">
                        <?= Yii::$app->session->getFlash('error') ?>
                    </div>
                <?php endif; ?>
            <div class="form-group" style="text-align: right;">
                <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

