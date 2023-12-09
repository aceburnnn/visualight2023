<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;

class ResetPasswordForm extends Model
{
    public $newPassword;

    public $password_repeat;

    public function rules()
    {
        return [
            [['newPassword', 'password_repeat'], 'required'],
            [['newPassword', 'password_repeat'], 'string', 'min' => 6],
            ['password_repeat', 'compare', 'compareAttribute' => 'newPassword'],
            ['newPassword', 'validatePasswordComplexity'],

        ];
    }

    public function validatePasswordComplexity($attribute, $params)
    {
        // Regular expression to check if the password contains special characters
        $specialCharacterRegex = '/[!@#$%^&*()\-_=+{};:,<.>]/';

        if (!empty($this->newPassword) && !preg_match($specialCharacterRegex, $this->$attribute)) {
            $this->addError($attribute, 'Password must contain special characters.');
        }
    }

    
}
