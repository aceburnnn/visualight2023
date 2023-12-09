<?php

namespace backend\controllers;

use Yii;
use common\models\SurveyResponse;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;


class SurveyController extends BaseController
{

     public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['login', 'logout', 'index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['?'],
                  ],
                  [
                      'allow' => true,
                      'actions' => ['index'],
                      'roles' => ['ADMIN', 'USER'], //add only admin allowed
                  ],
                  [
                    'allow' => true,
                    'actions' => ['logout'],
                    'roles' => ['@'], //everyone allowed
                ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new SurveyResponse();
    
        // If the form is submitted, save the data to the database
        if ($model->load(Yii::$app->request->post())) {
            try {
                // Debug the form data before loading into the model
                var_dump(Yii::$app->request->post());
                
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Survey response submitted successfully.');
                    return $this->refresh();
                } else {
                    Yii::$app->session->setFlash('error', 'Failed to save survey response.');
                }
            } catch (\Exception $e) {
                Yii::$app->session->setFlash('error', 'Error saving survey response: ' . $e->getMessage());
            }
            // Debug the model attributes before save
            var_dump($model->attributes);
        }
    
        return $this->render('surveyForm', ['model' => $model]);
    }
    

}
