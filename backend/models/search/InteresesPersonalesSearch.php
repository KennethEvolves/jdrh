<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\InteresesPersonales;

/**
 * InteresesPersonalesSearch represents the model behind the search form of `backend\models\InteresesPersonales`.
 */
class InteresesPersonalesSearch extends InteresesPersonales
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_interesesPersonales'], 'integer'],
            [['tipo_interesesPersonales'], 'safe'],
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
        $query = InteresesPersonales::find();

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
            'id_interesesPersonales' => $this->id_interesesPersonales,
        ]);

        $query->andFilterWhere(['like', 'tipo_interesesPersonales', $this->tipo_interesesPersonales]);

        return $dataProvider;
    }
}
