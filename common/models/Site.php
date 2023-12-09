<?php
//specifically made for chart.js label
namespace common\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "{{%date_label}}".
 * @property string|null $payment_date
 */
class Site extends ActiveRecord
{
    public $query;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%date_label}}';
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
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'date' => 'Date',
        ];
    }
}
