<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UsoPersonal;

/**
 * UsoPersonalSearch represents the model behind the search form of `backend\models\UsoPersonal`.
 */
class UsoPersonalSearch extends UsoPersonal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_usoPersonal'], 'integer'],
            [['tipo_usoPersonal'], 'safe'],
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
        $query = UsoPersonal::find();

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
            'id_usoPersonal' => $this->id_usoPersonal,
        ]);

        $query->andFilterWhere(['like', 'tipo_usoPersonal', $this->tipo_usoPersonal]);

        return $dataProvider;
    }
}
