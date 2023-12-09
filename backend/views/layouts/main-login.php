<?php

/* @var $this \yii\web\View */
/* @var $content string */

\hail812\adminlte3\assets\AdminLteAsset::register($this);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700');
$this->registerCssFile('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
\hail812\adminlte3\assets\PluginAsset::register($this)->add(['fontawesome', 'icheck-bootstrap']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/x-icon" href="/HeaderLogs.ico">
    <title>VISUALIGHT LOG IN</title>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>

<body class="hold-transition login-page" style="background-image: url(/images/back_ground.png); background-repeat: no-repeat; background-attachment: fixed;
  background-size: cover;">
    <?php $this->beginBody() ?>
    <div class="login-box">
        <div class="login-logo">

        </div>
        <!-- /.login-logo -->


        <?= $content ?>
    </div>
    <!-- /.login-box -->

    <?php
    if (class_exists('yii\debug\Module')) {
        $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
    }

   ?>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>