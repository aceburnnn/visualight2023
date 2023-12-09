<?php

namespace app\modules\dbeditor\Models;

use Yii;

/**
 * This is the model class for table "{{%transaction_type}}".
 *
 * @property int $id
 * @property string $type_code
 * @property string $type
 */
class TransactionType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%transaction_type}}';
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
            [['type_code', 'type'], 'required'],
            [['type_code', 'type'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_code' => 'Type Code',
            'type' => 'Type',
        ];
    }
}
