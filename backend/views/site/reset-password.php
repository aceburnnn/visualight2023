<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Reset Password';

?>

<style>

    body{
        background-color: #2A2C2F;
    }
</style>

<div class="site-reset-password" style="display: flex; justify-content: center; align-items: center; height: 100vh; margin-top: -55px; background-color: #2A2C2F;">
    <div style="width: 500px; background: white; padding: 1rem; border-radius: 20px; box-shadow: -4px 4px 8px rgba(0, 0, 0, 0.7), 0 6px 20px 0 rgba(0, 0, 0, 0.25);">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>Please choose your new password:</p>

        <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
            <?= $form->field($model, 'newPassword')->passwordInput() ?>
            <?= $form->field($model, 'password_repeat')->passwordInput() ?>
            <div class="form-group" style="text-align: right;">
                <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
