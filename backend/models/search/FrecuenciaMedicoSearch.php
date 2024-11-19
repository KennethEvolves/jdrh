<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FrecuenciaMedico;

/**
 * FrecuenciaMedicoSearch represents the model behind the search form of `backend\models\FrecuenciaMedico`.
 */
class FrecuenciaMedicoSearch extends FrecuenciaMedico
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_frecuenciaMedico'], 'integer'],
            [['frecuencia'], 'safe'],
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
        $query = FrecuenciaMedico::find();

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
            'id_frecuenciaMedico' => $this->id_frecuenciaMedico,
        ]);

        $query->andFilterWhere(['like', 'frecuencia', $this->frecuencia]);

        return $dataProvider;
    }
}
