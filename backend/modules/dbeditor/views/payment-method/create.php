<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\dbeditor\Models\PaymentMethod $model */
$this->registerCssFile(\yii\helpers\Url::to(['/css/custom.css']));

$this->title = 'Create Payment Method';
$this->params['breadcrumbs'][] = ['label' => 'Payment Methods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-method-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
