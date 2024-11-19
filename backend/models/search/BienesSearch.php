<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Bienes;

/**
 * BienesSearch represents the model behind the search form of `backend\models\Bienes`.
 */
class BienesSearch extends Bienes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bienes'], 'integer'],
            [['tipos_bienes'], 'safe'],
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
        $query = Bienes::find();

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
            'id_bienes' => $this->id_bienes,
        ]);

        $query->andFilterWhere(['like', 'tipos_bienes', $this->tipos_bienes]);

        return $dataProvider;
    }
}
