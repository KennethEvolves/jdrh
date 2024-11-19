<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Comiteen;

/**
 * ComiteenSearch represents the model behind the search form of `backend\models\Comiteen`.
 */
class ComiteenSearch extends Comiteen
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_comiteEN'], 'integer'],
            [['tipo_comiteEN'], 'safe'],
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
        $query = Comiteen::find();

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
            'id_comiteEN' => $this->id_comiteEN,
        ]);

        $query->andFilterWhere(['like', 'tipo_comiteEN', $this->tipo_comiteEN]);

        return $dataProvider;
    }
}
