<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PeriodoSemestral;

/**
 * PeriodoSemestralSearch represents the model behind the search form of `backend\models\PeriodoSemestral`.
 */
class PeriodoSemestralSearch extends PeriodoSemestral
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ciclo', 'semanas'], 'integer'],
            [['fecha_inicio', 'fecha_fin', 'periodo', 'estado', 'descripcion'], 'safe'],
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
        $query = PeriodoSemestral::find();

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
            'id_ciclo' => $this->id_ciclo,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'periodo' => $this->periodo,
            'semanas' => $this->semanas,
        ]);

        $query->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
