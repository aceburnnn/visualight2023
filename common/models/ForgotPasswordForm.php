<?php


namespace common\models;

use Yii;
use yii\base\Model;

class ForgotPasswordForm extends Model
{
    public $email;

    public function rules()
    {
        return [
            ['email', 'required'],
            ['email', 'email'],
        ];
    }

    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
        $this->token_created_at = time(); // Store the token creation timestamp
    }

}
