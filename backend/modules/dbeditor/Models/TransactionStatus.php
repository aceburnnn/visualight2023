<?php

namespace app\modules\dbeditor\Models;

use Yii;

/**
 * This is the model class for table "{{%transaction_status}}".
 *
 * @property int $id
 * @property string $status_code
 * @property string $status
 */
class TransactionStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%transaction_status}}';
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
            [['status_code', 'status'], 'required'],
            [['status_code', 'status'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_code' => 'Status Code',
            'status' => 'Status',
        ];
    }
}
