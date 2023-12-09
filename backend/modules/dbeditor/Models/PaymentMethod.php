<?php

namespace app\modules\dbeditor\Models;

use Yii;

/**
 * This is the model class for table "{{%payment_method}}".
 *
 * @property int $id
 * @property string $method_code
 * @property string $method
 */
class PaymentMethod extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%payment_method}}';
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
            [['method_code', 'method'], 'required'],
            [['method_code', 'method'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'method_code' => 'Method Code',
            'method' => 'Method',
        ];
    }
}
