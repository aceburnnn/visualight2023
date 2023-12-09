<?php

namespace app\modules\dbeditor\Models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\dbeditor\Models\TransactionStatus;

/**
 * TransactionStatusSearch represents the model behind the search form of `app\modules\dbeditor\Models\TransactionStatus`.
 */
class TransactionStatusSearch extends TransactionStatus
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['status_code', 'status'], 'safe'],
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
        $query = TransactionStatus::find();

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
        ]);

        $query->andFilterWhere(['like', 'status_code', $this->status_code])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
