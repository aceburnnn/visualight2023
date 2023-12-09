<?php

namespace app\modules\dbeditor\Models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\dbeditor\Models\Division;

/**
 * DivisionSearch represents the model behind the search form of `app\modules\dbeditor\Models\Division`.
 */
class DivisionSearch extends Division
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['division_code', 'division'], 'safe'],
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
        $query = Division::find();

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

        $query->andFilterWhere(['like', 'division_code', $this->division_code])
            ->andFilterWhere(['like', 'division', $this->division]);

        return $dataProvider;
    }
}
