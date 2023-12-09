<?php
// common/models/UserTerms.php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class UserTerms extends ActiveRecord
{
    public static function tableName()
    {
        return 'user'; // Replace with the actual table name if different
    }

    public function rules()
    {
        return [
            [['tos'], 'integer'],
            [['tos'], 'safe'],
        ];
    }
}
