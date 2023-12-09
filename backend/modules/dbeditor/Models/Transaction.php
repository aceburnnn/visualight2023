<?php

namespace app\modules\dbeditor\Models;

use Yii;

/**
 * This is the model class for table "transaction".
 *
 * @property int $id
 * @property int $transaction_number
 * @property int $customer_id
 * @property float $amount
 * @property int $transaction_type
 * @property string $transaction_date
 * @property int $transaction_status
 * @property int|null $payment_method
 * @property string|null $payment_date
 * @property int $division
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaction';
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
            [['transaction_number', 'customer_id', 'amount', 'transaction_type', 'transaction_date', 'transaction_status','payment_method','payment_date' ,'division'], 'required'],
            [['transaction_number', 'customer_id', 'transaction_type', 'transaction_status', 'payment_method', 'division'], 'integer'],
            [['amount'], 'number'],
            [['transaction_date', 'payment_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'transaction_number' => 'Transaction Number',
            'customer_id' => 'Customer ID',
            'amount' => 'Amount',
            'transaction_type' => 'Transaction Type',
            'transaction_date' => 'Transaction Date',
            'transaction_status' => 'Transaction Status',
            'payment_method' => 'Payment Method',
            'payment_date' => 'Payment Date',
            'division' => 'Division',
        ];
    }
}
