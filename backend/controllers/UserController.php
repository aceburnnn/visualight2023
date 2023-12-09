<?php

namespace backend\controllers;

use common\models\UserSearch;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use common\models\User;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\base\InvalidParamException;

class UserController extends BaseController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'permissions' => ['canCreateUser'],
                    ],
                    [
                        'actions' => ['send-verification-code'],
                        'allow' => true,
                        'permissions' => ['canResendEmailVerification'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionCreate()
    {
        $model = new User(['scenario' => User::SCENARIO_CREATE]);
        

        if ($model->load(Yii::$app->request->post())) {
            // Validate the model before saving
            if ($model->validate()) {
                // Check if a password is provided
                if (empty($model->newPassword)) {
                    Yii::$app->session->setFlash('error', 'Password is required.');
                } else {

                    // Save the user data
                    $model->setPassword($model->newPassword);
                    $model->generateAuthKey();
                    $model->generateEmailVerificationToken();
                    $model->status = User::STATUS_EMAIL_NOT_VERIFIED;
                    
                    if ($model->save()) {
                        $verificationLink = Url::to(['site/verify-email', 'token' => $model->verification_token], true);
                        $mailer = Yii::$app->mailer->compose()
                        ->setTo($model->email)
                        ->setFrom([Yii::$app->params['adminEmail'] => 'Visualight Team'])
                        ->setSubject('Email Verification')
                        ->setTextBody( "Hello, to complete your registration, please verify your email address by clicking the following link:\n" .
                        $verificationLink . "\n\n" .
                        "Your account details are as follows:\n" .
                        "Username: " . $model->username . "\n" .
                        "Password: " . $model->newPassword . "\n\n" .
                        "For your security, we strongly recommend that you change your password immediately after logging in.\n\n" .
                        "Best regards,\n" .
                        "The Visualight Team")
                        ->send();
                        if ($mailer) {
                            Yii::$app->session->setFlash('success', 'User created successfully. Please check your email for verification instructions.');
                            return $this->redirect(['/admin/assignment/view', 'id' => $model->id]);
                        }else {
                            Yii::$app->session->setFlash('error', 'Failed to send the verification email.');
                        }
                    } else {
                        Yii::$app->session->setFlash('error', 'Error saving user data.');
                    }
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


  public function actionSendVerificationCode()
{
    $model = new User(['scenario' => User::SCENARIO_CREATE]);


    if ($model->load(Yii::$app->request->post())) {
        // Check if the provided email exists in the database
        $existingUser = User::findByEmail($model->email);

        if ($existingUser !== null) {
            if ($existingUser->status === User::STATUS_ACTIVE) {
                Yii::$app->session->setFlash('info', 'That account is already verified.');
            } else {
                // Generate and set a new verification token
                $existingUser->generateEmailVerificationToken();
                if ($existingUser->save()) {
                    // Send the verification email
                    $verificationLink = Url::to(['site/verify-email', 'token' => $existingUser->verification_token], true);
                    $mailer = Yii::$app->mailer->compose()
                        ->setTo($existingUser->email)
                        ->setFrom([Yii::$app->params['adminEmail'] => 'Visualight Team'])
                        ->setSubject('Email Verification')
                        ->setTextBody("Hello, to complete your registration, please verify your email address by clicking the following link:\n" .
                        $verificationLink . "\n\n" .
                        "Once your email is verified, please proceed to the 'Forgot Password?' section to update your password, enabling you to access your account.\n\n" .
                        "Your account details are as follows:\n" .
                        "Email: " . $model->email . "\n" .
                        "Best regards,\n" .
                        "The Visualight Team")
                        ->send();

                    if ($mailer) {
                        Yii::$app->session->setFlash('success', 'Verification email has been resent successfully. Please check your email for instructions.');
                    } else {
                        Yii::$app->session->setFlash('error', 'Failed to resend the verification email.');
                    }
                } else {
                    Yii::$app->session->setFlash('error', 'Error generating verification code.');
                }
            }
        } else {
            Yii::$app->session->setFlash('error', 'Email address not found.');
        }
    }

    return $this->render('send-verification-code', [
        'model' => $model,
    ]);
}

    
    



    public function actionUpdate($id)
    {
        $model = User::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        // Store the existing password for later use
        $existingPassword = $model->password;

        // Set the scenario to SCENARIO_UPDATE after loading the model data
        $model->scenario = User::SCENARIO_UPDATE;

        // Clear the password attributes to prevent them from being displayed in the form
        $model->password = '';
        $model->newPassword = '';
        if ($model->load(Yii::$app->request->post())) {
            // Restore the existing password if it wasn't changed
            if (empty($model->newPassword)) {
                $model->password = $existingPassword;
            }

            if ($model->save()) {
                return $this->redirect(['index']); // Change 'index' to your desired destination
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $user = User::findOne($id);
        if ($user) {
            $user->delete();
        } else {
        }

        return $this->redirect(['index']);
    }

    public function actionView($id)
    {
        $user = User::findOne($id);
        if (!$user) {
            throw new NotFoundHttpException('The requested user does not exist.');
        }

        return $this->render('view', [
            'user' => $user,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionVerifyEmail($token)
    {
        $user = User::findByVerificationToken($token);

        if ($user !== null) {
            $user->status = User::STATUS_ACTIVE; // Mark the account as verified
            $user->removeEmailVerificationToken(); // Remove the verification token
            $user->save(false); // Save the user without validation

            Yii::$app->session->setFlash('success', 'Your email has been verified. You can now log in.');
        } else {
            Yii::$app->session->setFlash('error', 'Invalid verification token.');
        }

        return $this->redirect(['site/login']); // Redirect to the login page
    }

    
}
