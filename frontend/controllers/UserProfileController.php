<?php
// frontend/controllers/UserProfileController.php
namespace frontend\controllers;

use Yii;
use yii\base\Security;
use yii\helpers\FileHelper;
use yii\web\Controller;
use common\models\UserProfile;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class UserProfileController extends BaseController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['view','update'],
                'rules' => [
                   [
                           'allow' => true,
                           'actions' => ['view','update'],
                           'roles' => ['@'],
                   ],
                   [
                    'allow' => false,
                    'roles' => ['GUEST'],
                    ],
                  [
                      'allow' => true,
                      'actions' => ['logout'],
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
    public function actionView()
    {
        $user = Yii::$app->user->identity;
        return $this->render('view', ['user' => $user]);
    }

    public function actionUpdate()
    {
        $model = UserProfile::findOne(Yii::$app->user->id);

        if (!$model) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        // Set the scenario to SCENARIO_UPDATE after loading the model data
        $model->scenario = UserProfile::SCENARIO_UPDATE;

        if ($model->load(Yii::$app->request->post())) {
            // Handle password update
            $model->newPassword = Yii::$app->request->post('UserProfile')['newPassword'];

            if ($model->validate()) {
                if (!empty($model->newPassword)) {
                    $security = new Security();
                    $model->password_hash = $security->generatePasswordHash($model->newPassword);
                }

                // Handle image upload
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                if ($model->imageFile) {
                    $fileName = Yii::$app->security->generateRandomString(20) . '.' . $model->imageFile->extension;
                    $uploadPath = Yii::getAlias('@common/uploads/') . $fileName;

                    // Create the "uploads" directory if it doesn't exist
                    FileHelper::createDirectory(Yii::getAlias('@webroot/uploads'));

                    // Move the uploaded image to the "uploads" folder
                    if ($model->imageFile->saveAs($uploadPath)) {
                        $model->profile_picture = $fileName;
                    } else {
                        Yii::$app->session->setFlash('error', 'Error uploading image.');
                    }
                }

                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'User profile updated successfully.');
                    return $this->redirect(['view']);
                } else {
                    Yii::$app->session->setFlash('error', 'Error updating user profile.');
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionGetProfilePicture($fileName)
    {
        $filePath = Yii::getAlias('@common/uploads/') . $fileName;

        if (file_exists($filePath)) {
            return Yii::$app->response->sendFile($filePath, null, ['inline' => true]);
        } else {
            throw new NotFoundHttpException('The requested profile picture does not exist.');
        }
    }


}
