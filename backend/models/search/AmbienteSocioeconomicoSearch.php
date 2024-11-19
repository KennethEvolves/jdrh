<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AmbienteSocioeconomico;

/**
 * AmbienteSocioeconomicoSearch represents the model behind the search form of `backend\models\AmbienteSocioeconomico`.
 */
class AmbienteSocioeconomicoSearch extends AmbienteSocioeconomico
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ambienteSocioeconomico', 'vivienda_padres', 'id_servicios', 'id_usoPersonal', 'id_transporte', 'id_tiempo', 'id_vivienda', 'id_bienes'], 'integer'],
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
        $query = AmbienteSocioeconomico::find();

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
            'id_ambienteSocioeconomico' => $this->id_ambienteSocioeconomico,
            'vivienda_padres' => $this->vivienda_padres,
            'id_servicios' => $this->id_servicios,
            'id_usoPersonal' => $this->id_usoPersonal,
            'id_transporte' => $this->id_transporte,
            'id_tiempo' => $this->id_tiempo,
            'id_vivienda' => $this->id_vivienda,
            'id_bienes' => $this->id_bienes,
        ]);

        return $dataProvider;
    }
}
