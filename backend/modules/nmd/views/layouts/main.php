<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

$this->beginContent('@app/views/layouts/main.php'); // You can adjust the path to the base layout according to your application structure
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?= $content ?>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>
