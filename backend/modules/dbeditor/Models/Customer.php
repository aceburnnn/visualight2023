<?php

namespace app\modules\dbeditor\Models;

use Yii;

/**
 * This is the model class for table "{{%customer}}".
 *
 * @property int $id
 * @property int $customer_type
 * @property string $address
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
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
            [['customer_type', 'address'], 'required'],
            [['customer_type'], 'integer'],
            [['address'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_type' => 'Customer Type',
            'address' => 'Address',
        ];
    }
}
