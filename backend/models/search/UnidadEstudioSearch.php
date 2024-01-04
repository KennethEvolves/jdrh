<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UnidadEstudio;

/**
 * UnidadEstudioSearch represents the model behind the search form of `backend\models\UnidadEstudio`.
 */
class UnidadEstudioSearch extends UnidadEstudio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_unidad', 'creditos_asignatura', 'num_momentos', 'plan_estudios_id_plan', 'fases_id_fase'], 'integer'],
            [['clave', 'nombre_asignatura', 'des_general', 'ras_perfil', 'sabe_profesionales', 'elem_universo', 'satca', 'semestre'], 'safe'],
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
        $query = UnidadEstudio::find();

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
            'id_unidad' => $this->id_unidad,
            'creditos_asignatura' => $this->creditos_asignatura,
            'num_momentos' => $this->num_momentos,
            'plan_estudios_id_plan' => $this->plan_estudios_id_plan,
            'fases_id_fase' => $this->fases_id_fase,
        ]);

        $query->andFilterWhere(['like', 'clave', $this->clave])
            ->andFilterWhere(['like', 'nombre_asignatura', $this->nombre_asignatura])
            ->andFilterWhere(['like', 'des_general', $this->des_general])
            ->andFilterWhere(['like', 'ras_perfil', $this->ras_perfil])
            ->andFilterWhere(['like', 'sabe_profesionales', $this->sabe_profesionales])
            ->andFilterWhere(['like', 'elem_universo', $this->elem_universo])
            ->andFilterWhere(['like', 'satca', $this->satca])
            ->andFilterWhere(['like', 'semestre', $this->semestre]);

        return $dataProvider;
    }
}
