<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;

class PdfUploadForm extends Model
{
    public $pdfFile;
    public $selectedRoles;
    public $selectedEmails;


    public function rules()
    {
        return [
            [['pdfFile'], 'required'], // Make sure to add selectedRoles to the required rule
            [['pdfFile'], 'file', 'extensions' => 'pdf', 'maxFiles' => 10], // Allow up to 10 PDF files
            ['selectedRoles', 'validateSelectedRoles'],
            ['selectedEmails', 'each', 'rule' => ['email']],

        ];
    }

    public function validateSelectedRoles($attribute, $params)
    {
        if (empty($this->$attribute)) {
            $this->addError($attribute, 'Please select at least one role.');
        }
    }

    public function getRolesList()
    {
        return ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'name');
    }

    public function getEmailsList()
    {
        return ArrayHelper::map(User::find()->all(), 'email', 'email');
    }
}
