<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\dbeditor\Models\TransactionType $model */
$this->registerCssFile(\yii\helpers\Url::to(['/css/custom.css']));

$this->title = 'Create Transaction Type';
$this->params['breadcrumbs'][] = ['label' => 'Transaction Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
