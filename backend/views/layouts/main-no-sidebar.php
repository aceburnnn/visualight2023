<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

\hail812\adminlte3\assets\FontAwesomeAsset::register($this);

$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback');


$assetDir = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="/HeaderLogs.ico">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="hold-transition skin-blue">
    <?php $this->beginBody() ?>

    <div class="wrapper">
        <!-- Navbar -->
        <?= $this->render('navbar1', ['assetDir' => $assetDir]) ?>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <?= $this->render('content', ['content' => $content, 'assetDir' => $assetDir]) ?>
        <!-- /.content-wrapper -->
    </div>

   <?php
    if (class_exists('yii\debug\Module')) {
        $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
    }

   ?>
    <?php $this->endBody() ?>

    
</body>

</html>
<?php $this->endPage() ?>