<?php
use yii\helpers\Html;
?>
<div class="">
    <div class="card-body login-card-body" style="background: linear-gradient(180deg, rgba(6, 6, 6, 0.80) 0%, rgba(34, 37, 52, 0.80) 91.55%); border-radius: 20px;">
        <!-- <p class="login-box-msg"></p> -->
        <img src="/images/LogoVL2.png" alt="qwerty" style="width: 100%">

        <?php $form = \yii\bootstrap4\ActiveForm::begin(['id' => 'login-form']) ?>

        <?php if (Yii::$app->session->hasFlash('error')): ?>
            <div class="alert alert-danger">
                <?= Yii::$app->session->getFlash('error') ?>
            </div>
        <?php endif; ?>

        <?= $form->field($model,'username', [
            'options' => ['class' => 'form-group has-feedback'],
            'template' => '{beginWrapper}{input}{error}{endWrapper}',
            'wrapperOptions' => ['class' => 'input-group mb-3']
        ])
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form->field($model, 'password', [
            'options' => ['class' => 'form-group has-feedback'],
            'template' => '{beginWrapper}{input}{error}{endWrapper}',
            'wrapperOptions' => ['class' => 'input-group mb-3']
        ])
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row" style="color: white;">
            <div class="col-8">
                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => '<div class="icheck-primary">{input}{label}</div>',
                    'labelOptions' => [
                        'class' => ''
                    ],
                    'uncheck' => null
                ]) ?>
            </div>
            <!-- <div class="col-4">
            <?= Html::a('Sign Up', ['site/signup'], ['class' => 'btn btn-secondary btn-block']) ?>
            </div> -->
        </div>
        <div class="col-20">
                <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary btn-block']) ?>
            </div>
        <?php \yii\bootstrap4\ActiveForm::end(); ?>


</div>