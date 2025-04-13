<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\InformacionAcademica;

/**
 * InformacionAcademicaSearch represents the model behind the search form of `backend\models\InformacionAcademica`.
 */
class InformacionAcademicaSearch extends InformacionAcademica
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['inf_academica_id', 'horas_estudio_diario'], 'integer'],
            [['estudio_adicional', 'actividad_extraescolar'], 'safe'],
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
        $query = InformacionAcademica::find();

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
            'inf_academica_id' => $this->inf_academica_id,
            'horas_estudio_diario' => $this->horas_estudio_diario,
        ]);

        $query->andFilterWhere(['like', 'estudio_adicional', $this->estudio_adicional])
            ->andFilterWhere(['like', 'actividad_extraescolar', $this->actividad_extraescolar]);

        return $dataProvider;
    }
}
