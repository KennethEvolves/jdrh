<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FrecuenciaConsumo;

/**
 * FrecuenciaConsumoSearch represents the model behind the search form of `backend\models\FrecuenciaConsumo`.
 */
class FrecuenciaConsumoSearch extends FrecuenciaConsumo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_frecuenciaConsumo', 'id_escala'], 'integer'],
            [['tipo_alimento'], 'safe'],
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
        $query = FrecuenciaConsumo::find();

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
            'id_frecuenciaConsumo' => $this->id_frecuenciaConsumo,
            'id_escala' => $this->id_escala,
        ]);

        $query->andFilterWhere(['like', 'tipo_alimento', $this->tipo_alimento]);

        return $dataProvider;
    }
}
