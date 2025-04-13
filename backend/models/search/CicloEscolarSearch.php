<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CicloEscolar;

/**
 * CicloEscolarSearch represents the model behind the search form of `backend\models\CicloEscolar`.
 */
class CicloEscolarSearch extends CicloEscolar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ciclo_escolar_id', 'año_inicio', 'año_fin'], 'integer'],
            [['nombre_ciclo_escolar'], 'safe'],
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
        $query = CicloEscolar::find();

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
            'ciclo_escolar_id' => $this->ciclo_escolar_id,
            'año_inicio' => $this->año_inicio,
            'año_fin' => $this->año_fin,
        ]);

        $query->andFilterWhere(['like', 'nombre_ciclo_escolar', $this->nombre_ciclo_escolar]);

        return $dataProvider;
    }
}
