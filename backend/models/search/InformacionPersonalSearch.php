<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\InformacionPersonal;

/**
 * InformacionPersonalSearch represents the model behind the search form of `backend\models\InformacionPersonal`.
 */
class InformacionPersonalSearch extends InformacionPersonal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['inf_personal_id', 'fk_licenciatura', 'fk_ciclo_escolar', 'primera_opcion', 'eleccion_definitiva'], 'integer'],
            [['otra_licenciatura', 'proyecto_5_anios', 'proyecto_10_anios'], 'safe'],
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
        $query = InformacionPersonal::find();

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
            'inf_personal_id' => $this->inf_personal_id,
            'fk_licenciatura' => $this->fk_licenciatura,
            'fk_ciclo_escolar' => $this->fk_ciclo_escolar,
            'primera_opcion' => $this->primera_opcion,
            'eleccion_definitiva' => $this->eleccion_definitiva,
        ]);

        $query->andFilterWhere(['like', 'otra_licenciatura', $this->otra_licenciatura])
            ->andFilterWhere(['like', 'proyecto_5_anios', $this->proyecto_5_anios])
            ->andFilterWhere(['like', 'proyecto_10_anios', $this->proyecto_10_anios]);

        return $dataProvider;
    }
}
