<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\OptTemasCapacitacion;

/**
 * OptTemasCapacitacionSearch represents the model behind the search form of `backend\models\OptTemasCapacitacion`.
 */
class OptTemasCapacitacionSearch extends OptTemasCapacitacion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tema_id'], 'integer'],
            [['nombre_tema'], 'safe'],
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
        $query = OptTemasCapacitacion::find();

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
            'tema_id' => $this->tema_id,
        ]);

        $query->andFilterWhere(['like', 'nombre_tema', $this->nombre_tema]);

        return $dataProvider;
    }
}
