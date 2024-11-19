<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Adicciones;

/**
 * AdiccionesSearch represents the model behind the search form of `backend\models\Adicciones`.
 */
class AdiccionesSearch extends Adicciones
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_adicciones'], 'integer'],
            [['tipo_adicciones'], 'safe'],
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
        $query = Adicciones::find();

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
            'id_adicciones' => $this->id_adicciones,
        ]);

        $query->andFilterWhere(['like', 'tipo_adicciones', $this->tipo_adicciones]);

        return $dataProvider;
    }
}
