<?php
/* @var $this yii\web\View */
/* @var $layout string */

$this->layout = $layout;

use yii\helpers\Html;

$this->title = 'Invalid Token';
?>

<div class="site-reset-password">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>The password reset token is invalid or has expired.</p>
</div>


