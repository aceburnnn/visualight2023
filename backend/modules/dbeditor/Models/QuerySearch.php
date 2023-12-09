<?php

namespace app\modules\dbeditor\Models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\dbeditor\Models\Query;

/**
 * QuerySearch represents the model behind the search form of `app\modules\dbeditor\Models\Query`.
 */
class QuerySearch extends Query
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'transaction_number', 'customer_id', 'transaction_type', 'transaction_status', 'payment_method', 'division',], 'integer'],
            [['amount'], 'number'],
            [['transaction_date', 'payment_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Query::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'transaction_number' => $this->transaction_number,
            'customer_id' => $this->customer_id,
            'amount' => $this->amount,
            'transaction_type' => $this->transaction_type,
            'transaction_date' => $this->transaction_date,
            'transaction_status' => $this->transaction_status,
            'payment_method' => $this->payment_method,
            'payment_date' => $this->payment_date,
            'division' => $this->division,
        ]);

        return $dataProvider;
    }
}
