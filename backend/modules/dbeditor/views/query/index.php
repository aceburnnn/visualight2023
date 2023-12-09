<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\dbeditor\Models\QuerySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
?>
<style>
    .top-side {
        border: 0.1rem dashed grey;
        margin: 1rem;
        margin-left: 5%;
        padding: 1%;
        padding-left: 1.5%;
        width: 90%;
        height: 10vh;
        display: flex;
        align-items: top;
        justify-content: left;
        border-radius: 1rem;
        background-color: white;
        resize: vertical;
        overflow-y: scroll;
        resize: none;
    }

    .bot-side {
        border: 0.1rem solid grey;
        margin: 1rem;
        margin-left: 5%;
        padding: 2%;
        width: 90%;
        height: 65vh;
        align-items: center;
        border-radius: 1rem;
        background-color: white;
        resize: vertical;
        overflow-y: scroll;
    }

    .submit-button {
        border-radius: 1rem;
        background-color: #00BDB2;
        font-size: .9rem;
        text-align: center;
        margin-left: 5%;
        padding: 0.2rem;
        padding-left: 1rem;
        padding-right: 1rem;
        color: white;
        width: 7rem;

    }
</style>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'query')->textarea(['class' => 'top-side']) ?>

<?= Html::submitButton('Search', ['class' => 'submit-button']) ?>

<?php ActiveForm::end(); ?>

<?php if (isset($result) && is_array($result) && !empty($result)) : ?>
    <h5>Result:</h5>
    <div class="bot-side">
        <?= GridView::widget([
            'dataProvider' => new \yii\data\ArrayDataProvider([
                'allModels' => $result,
                'pagination' => false,
            ]),
            'columns' => array_keys(reset($result)),
        ]) ?>
    </div>
<?php else : ?>
    <h5>Result:</h5>
    <div class="bot-side">
        <?php echo ("Enter a Valid Query"); ?>
    </div>
<?php endif; ?>