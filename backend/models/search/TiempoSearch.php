<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tiempo;

/**
 * TiempoSearch represents the model behind the search form of `backend\models\Tiempo`.
 */
class TiempoSearch extends Tiempo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tiempo'], 'integer'],
            [['tiempo_llegada'], 'safe'],
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
        $query = Tiempo::find();

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
            'id_tiempo' => $this->id_tiempo,
        ]);

        $query->andFilterWhere(['like', 'tiempo_llegada', $this->tiempo_llegada]);

        return $dataProvider;
    }
}
