<?php

namespace app\modules\dbeditor\Models;

use Yii;

/**
 * This is the model class for table "{{%division}}".
 *
 * @property int $id
 * @property string $division_code
 * @property string $division
 */
class Division extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%division}}';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_data');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['division_code', 'division'], 'required'],
            [['division_code', 'division'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'division_code' => 'Division Code',
            'division' => 'Division',
        ];
    }
}
