<?php

// Ang `namespace` ay parang location o address kung saan makikita ang controller na ito sa folder na `backend\modules\chart\controllers`.
namespace backend\modules\predict\controllers;

// I-import natin yung kailangan nating class para ma-extend yung Yii Controller.
use backend\controllers\BaseController;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\db\Query;

// I-extend natin yung Controller class para makagawa tayo ng ating custom ChartController.
class ChartController extends BaseController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login','index'],
                'rules' => [
                  [
                      'allow' => true,
                      'actions' => ['index'],
                      'permissions' => ['canPredict'], //add only admin allowed
                  ]
                ],
            ],
        ];
    }
    
    // Ito yung pangunahing action na tatawagin kapag may nag-access sa page ng chart.
    public function actionIndex()
    {
        return $this->render('index');

    }

}
