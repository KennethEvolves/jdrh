<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Expediente;

/**
 * ExpedienteSearch represents the model behind the search form of `backend\models\Expediente`.
 */
class ExpedienteSearch extends Expediente
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idexpediente', 'id_tutor', 'id_generacion', 'id_grupocreado'], 'integer'],
            [['fecha_elaboracion', 'fecha_actualizacion'], 'safe'],
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
        $query = Expediente::find();

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
            'idexpediente' => $this->idexpediente,
            'id_tutor' => $this->id_tutor,
            'id_generacion' => $this->id_generacion,
            'id_grupocreado' => $this->id_grupocreado,
            'fecha_elaboracion' => $this->fecha_elaboracion,
            'fecha_actualizacion' => $this->fecha_actualizacion,
        ]);

        return $dataProvider;
    }
}
