<?php
/* @var $this yii\web\View */
/* @var $layout string */


use yii\helpers\Html;

$this->title = 'Password Token Sent';

?>

<style>

    body{
        background-color: #2A2C2F;
    }
</style>

<div class="site-reset-password" style="display: flex; justify-content: center; align-items: center; height: 100vh; margin-top: -55px; background-color: #2A2C2F;">
    <div style="width: 500px; background: white; padding: 1rem; border-radius: 20px; box-shadow: -4px 4px 8px rgba(0, 0, 0, 0.7), 0 6px 20px 0 rgba(0, 0, 0, 0.25);">
    <h3><?= Html::encode($this->title) ?></h3> <br>
    <p>The password reset token has been sent to your email. Take note that the password token will expire in 10 minutes.</p> <br>
    <p> You may close this window now.</P>
</div>
</div>