<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PercepcionInstitucion;

/**
 * PercepcionInstitucionSearch represents the model behind the search form of `backend\models\PercepcionInstitucion`.
 */
class PercepcionInstitucionSearch extends PercepcionInstitucion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['per_inst_id'], 'integer'],
            [['aspectos_positivos', 'areas_oportunidad', 'observaciones'], 'safe'],
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
        $query = PercepcionInstitucion::find();

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
            'per_inst_id' => $this->per_inst_id,
        ]);

        $query->andFilterWhere(['like', 'aspectos_positivos', $this->aspectos_positivos])
            ->andFilterWhere(['like', 'areas_oportunidad', $this->areas_oportunidad])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
