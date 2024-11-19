<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Deporte;

/**
 * DeporteSearch represents the model behind the search form of `backend\models\Deporte`.
 */
class DeporteSearch extends Deporte
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_deporte'], 'integer'],
            [['tipo_deporte'], 'safe'],
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
        $query = Deporte::find();

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
            'id_deporte' => $this->id_deporte,
        ]);

        $query->andFilterWhere(['like', 'tipo_deporte', $this->tipo_deporte]);

        return $dataProvider;
    }
}
