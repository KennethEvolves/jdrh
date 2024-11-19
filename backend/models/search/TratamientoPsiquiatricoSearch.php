<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TratamientoPsiquiatrico;

/**
 * TratamientoPsiquiatricoSearch represents the model behind the search form of `backend\models\TratamientoPsiquiatrico`.
 */
class TratamientoPsiquiatricoSearch extends TratamientoPsiquiatrico
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tratamientoPsiquiatrico'], 'integer'],
            [['tipo_psiquiatra', 'tipo_tiempo', 'tipo_lugar'], 'safe'],
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
        $query = TratamientoPsiquiatrico::find();

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
            'id_tratamientoPsiquiatrico' => $this->id_tratamientoPsiquiatrico,
        ]);

        $query->andFilterWhere(['like', 'tipo_psiquiatra', $this->tipo_psiquiatra])
            ->andFilterWhere(['like', 'tipo_tiempo', $this->tipo_tiempo])
            ->andFilterWhere(['like', 'tipo_lugar', $this->tipo_lugar]);

        return $dataProvider;
    }
}
