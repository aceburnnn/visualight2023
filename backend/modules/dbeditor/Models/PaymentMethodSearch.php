<?php

namespace app\modules\dbeditor\Models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\dbeditor\Models\PaymentMethod;

/**
 * PaymentMethodSearch represents the model behind the search form of `app\modules\dbeditor\Models\PaymentMethod`.
 */
class PaymentMethodSearch extends PaymentMethod
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['method_code', 'method'], 'safe'],
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
        $query = PaymentMethod::find();

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

        $query->andFilterWhere(['like', 'method_code', $this->method_code])
            ->andFilterWhere(['like', 'method', $this->method]);

        return $dataProvider;
    }
}
