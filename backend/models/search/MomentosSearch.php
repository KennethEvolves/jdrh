<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Momentos;

/**
 * MomentosSearch represents the model behind the search form of `backend\models\Momentos`.
 */
class MomentosSearch extends Momentos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_momento', 'unidad_estudio_id_unidad'], 'integer'],
            [['nombre', 'subtemas', 'act_aprendizaje', 'act_ensenanza', 'sugerencia_evaluacion', 'fuentes_aprendizaje'], 'safe'],
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
        $query = Momentos::find();

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
            'id_momento' => $this->id_momento,
            'unidad_estudio_id_unidad' => $this->unidad_estudio_id_unidad,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'subtemas', $this->subtemas])
            ->andFilterWhere(['like', 'act_aprendizaje', $this->act_aprendizaje])
            ->andFilterWhere(['like', 'act_ensenanza', $this->act_ensenanza])
            ->andFilterWhere(['like', 'sugerencia_evaluacion', $this->sugerencia_evaluacion])
            ->andFilterWhere(['like', 'fuentes_aprendizaje', $this->fuentes_aprendizaje]);

        return $dataProvider;
    }
}
