<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->registerCssFile(Url::to(['/css/custom.css']));


$this->title = 'Survey Form';
$this->params['breadcrumbs'][] = $this->title;
?>

<h2><?= Html::encode($this->title) ?></h3>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'visualight_rating')->radioList(['Very Poor' => 'Very Poor', 'Poor' => 'Poor', 'Satisfactory' => 'Satisfactory', 'Good' => 'Good', 'Very Good' => 'Very Good']) ?>

<br>

<?= $form->field($model, 'charts_useful')->radioList(['Yes' => 'Yes', 'No' => 'No']) ?>

<br>

<?= $form->field($model, 'scorecards_rating')->radioList(['Very Poor' => 'Very Poor', 'Poor' => 'Poor', 'Satisfactory' => 'Satisfactory', 'Good' => 'Good', 'Very Good' => 'Very Good']) ?>

<br>

<?= $form->field($model, 'filters_helpful')->radioList(['Yes' => 'Yes', 'No' => 'No']) ?>

<br>

<?= $form->field($model, 'charts_summary')->radioList(['Yes' => 'Yes', 'No' => 'No']) ?>

<br>

<?= $form->field($model, 'user_friendly_rating')->radioList(['Very Poor' => 'Very Poor', 'Poor' => 'Poor', 'Satisfactory' => 'Satisfactory', 'Good' => 'Good', 'Very Good' => 'Very Good']) ?>

<br>

<?= $form->field($model, 'charts_color_palette')->radioList(['Yes' => 'Yes', 'No' => 'No']) ?>

<br>

<?= $form->field($model, 'charts_easy_to_understand')->radioList(['Yes' => 'Yes', 'No' => 'No']) ?>

<br>

<?= $form->field($model, 'least_useful_chart')->radioList([
    'a' => 'Physical Report of Operations',
    'b' => 'Total Transaction per Sales, Method, and Division',
    'c' => 'Average Transaction per Sales, Method, and Division',
    'd' => 'Total Sales per Method and Division',
    'e' => 'Customer Charts',
]) ?>

<br>

<?= $form->field($model, 'most_useful_chart')->radioList([
    'a' => 'Physical Report of Operations',
    'b' => 'Total Transaction per Sales, Method, and Division',
    'c' => 'Average Transaction per Sales, Method, and Division',
    'd' => 'Total Sales per Method and Division',
    'e' => 'Customer Charts',
]) ?>

<br>

<?= $form->field($model, 'comments')->textarea(['rows' => 4]) ?>


<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
