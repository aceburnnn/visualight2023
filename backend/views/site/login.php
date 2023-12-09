<?php

use yii\helpers\Html;

?>
<div class="">
    <div class="card-body login-card-body" style="background: linear-gradient(180deg, rgba(6, 6, 6, 0.80) 0%, rgba(34, 37, 52, 0.80) 91.55%); border-radius: 20px;">
        <!-- <p class="login-box-msg">Sign in to start your session UwU</p> -->
        <img src="/images/LogoVL.png" alt="qwerty" style="width: 100%">

        <?php if (Yii::$app->session->hasFlash('error')): ?>
            <div class="alert alert-danger">
                <?= Yii::$app->session->getFlash('error') ?>
            </div>
        <?php endif; ?>

        <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success">
                <?= Yii::$app->session->getFlash('success') ?>
            </div>
        <?php endif; ?>

<!-- Your login form code -->



        <?php $form = \yii\bootstrap5\ActiveForm::begin(['id' => 'login-form']) ?>

        <?= $form->field($model, 'username', [
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

        <div class="row" style="color: white">
            <div class="col-8">
                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => '<div class="icheck-primary">{input}{label}</div>',
                    'labelOptions' => [
                        'class' => ''
                    ],
                    'uncheck' => null
                ]) ?>
            </div>
                <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary btn-block']) ?>
                <p style="width: 100%; display: inline-block; text-align: center; margin-top: 15px;"><?= Html::a('Forgot Password?', ['/site/forgot-password']) ?></p>

        </div>

        <?php \yii\bootstrap5\ActiveForm::end(); ?>


    </div>
    <!-- /.login-card-body -->
</div>