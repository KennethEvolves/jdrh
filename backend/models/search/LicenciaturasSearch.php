<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Licenciaturas;

/**
 * LicenciaturasSearch represents the model behind the search form of `backend\models\Licenciaturas`.
 */
class LicenciaturasSearch extends Licenciaturas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['licenciatura_id'], 'integer'],
            [['nombre_licenciatura', 'desc_licenciatura'], 'safe'],
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
        $query = Licenciaturas::find();

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
            'licenciatura_id' => $this->licenciatura_id,
        ]);

        $query->andFilterWhere(['like', 'nombre_licenciatura', $this->nombre_licenciatura])
            ->andFilterWhere(['like', 'desc_licenciatura', $this->desc_licenciatura]);

        return $dataProvider;
    }
}
