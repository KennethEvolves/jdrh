<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Habitos;

/**
 * HabitosSearch represents the model behind the search form of `backend\models\Habitos`.
 */
class HabitosSearch extends Habitos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_habitos', 'id_adicciones'], 'integer'],
            [['habito_fumar', 'num_cigarros', 'habito_alcohol', 'veces_semana'], 'safe'],
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
        $query = Habitos::find();

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
            'id_habitos' => $this->id_habitos,
            'id_adicciones' => $this->id_adicciones,
        ]);

        $query->andFilterWhere(['like', 'habito_fumar', $this->habito_fumar])
            ->andFilterWhere(['like', 'num_cigarros', $this->num_cigarros])
            ->andFilterWhere(['like', 'habito_alcohol', $this->habito_alcohol])
            ->andFilterWhere(['like', 'veces_semana', $this->veces_semana]);

        return $dataProvider;
    }
}
