<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\EscalaConsumo;

/**
 * EscalaConsumoSearch represents the model behind the search form of `backend\models\EscalaConsumo`.
 */
class EscalaConsumoSearch extends EscalaConsumo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_escala'], 'integer'],
            [['descripcion_frecuencia', 'valor_escala'], 'safe'],
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
        $query = EscalaConsumo::find();

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
            'id_escala' => $this->id_escala,
        ]);

        $query->andFilterWhere(['like', 'descripcion_frecuencia', $this->descripcion_frecuencia])
            ->andFilterWhere(['like', 'valor_escala', $this->valor_escala]);

        return $dataProvider;
    }
}
