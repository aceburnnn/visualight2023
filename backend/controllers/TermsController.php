<?php
// backend/controllers/TermsController.php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\UserTerms;

class TermsController extends Controller
{
    public function actionIndex()
    {
        $currentUser = Yii::$app->user->identity;

        // Check if the current user's record already exists in the UserTerms table
        $model = UserTerms::findOne(['id' => $currentUser->id]);

        if ($model === null) {
            // If the record doesn't exist, create a new UserTerms model
            $model = new UserTerms();
            $model->id = $currentUser->id; // Assuming 'id' is the primary key of the 'user' table
        } elseif ($model->tos) {
            // If 'tos' is already set, disable the checkbox to prevent further updates
            $model->tos = true;
            $model->save(false); // Save without validation
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'TOS accepted successfully.');
            return $this->refresh();        
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
