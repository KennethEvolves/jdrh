<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DatosGenerales;

/**
 * DatosGeneralesSearch represents the model behind the search form of `backend\models\DatosGenerales`.
 */
class DatosGeneralesSearch extends DatosGenerales
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iddatos_generales'], 'integer'],
            [['licenciatura', 'generacion', 'nombre_padre', 'ocupcion_padre', 'nombre_madre', 'ocupacion_madre', 'telefono', 'lugar_nacimiento'], 'safe'],
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
        $query = DatosGenerales::find();

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
            'iddatos_generales' => $this->iddatos_generales,
        ]);

        $query->andFilterWhere(['like', 'licenciatura', $this->licenciatura])
            ->andFilterWhere(['like', 'generacion', $this->generacion])
            ->andFilterWhere(['like', 'nombre_padre', $this->nombre_padre])
            ->andFilterWhere(['like', 'ocupcion_padre', $this->ocupcion_padre])
            ->andFilterWhere(['like', 'nombre_madre', $this->nombre_madre])
            ->andFilterWhere(['like', 'ocupacion_madre', $this->ocupacion_madre])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'lugar_nacimiento', $this->lugar_nacimiento]);

        return $dataProvider;
    }
}
