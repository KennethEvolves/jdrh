<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\LugarAlimentacion;

/**
 * LugarAlimentacionSearch represents the model behind the search form of `backend\models\LugarAlimentacion`.
 */
class LugarAlimentacionSearch extends LugarAlimentacion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_lugarAlimentacion', 'id_escala'], 'integer'],
            [['tipo_lugar'], 'safe'],
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
        $query = LugarAlimentacion::find();

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
            'id_lugarAlimentacion' => $this->id_lugarAlimentacion,
            'id_escala' => $this->id_escala,
        ]);

        $query->andFilterWhere(['like', 'tipo_lugar', $this->tipo_lugar]);

        return $dataProvider;
    }
}
