<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ServicioSalud;

/**
 * ServicioSaludSearch represents the model behind the search form of `backend\models\ServicioSalud`.
 */
class ServicioSaludSearch extends ServicioSalud
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_servicioSalud'], 'integer'],
            [['tipo_servicio'], 'safe'],
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
        $query = ServicioSalud::find();

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
            'id_servicioSalud' => $this->id_servicioSalud,
        ]);

        $query->andFilterWhere(['like', 'tipo_servicio', $this->tipo_servicio]);

        return $dataProvider;
    }
}
