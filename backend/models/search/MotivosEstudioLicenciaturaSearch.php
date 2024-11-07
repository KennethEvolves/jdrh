<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MotivosEstudioLicenciatura;

/**
 * MotivosEstudioLicenciaturaSearch represents the model behind the search form of `backend\models\MotivosEstudioLicenciatura`.
 */
class MotivosEstudioLicenciaturaSearch extends MotivosEstudioLicenciatura
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_motivosEstudioLicenciatura'], 'integer'],
            [['motivos'], 'safe'],
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
        $query = MotivosEstudioLicenciatura::find();

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
            'id_motivosEstudioLicenciatura' => $this->id_motivosEstudioLicenciatura,
        ]);

        $query->andFilterWhere(['like', 'motivos', $this->motivos]);

        return $dataProvider;
    }
}
