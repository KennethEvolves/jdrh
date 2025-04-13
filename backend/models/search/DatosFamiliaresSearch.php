<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DatosFamiliares;

/**
 * DatosFamiliaresSearch represents the model behind the search form of `backend\models\DatosFamiliares`.
 */
class DatosFamiliaresSearch extends DatosFamiliares
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_datosFamiliares', 'fk_estado_civil'], 'integer'],
            [['padre_nombre', 'padre_apellido', 'padre_ocupacion', 'padre_fecha_nacimiento', 'madre_nombre', 'madre_apellido', 'madre_ocupacion', 'madre_fecha_nacimiento'], 'safe'],
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
        $query = DatosFamiliares::find();

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
            'id_datosFamiliares' => $this->id_datosFamiliares,
            'fk_estado_civil' => $this->fk_estado_civil,
            'padre_fecha_nacimiento' => $this->padre_fecha_nacimiento,
            'madre_fecha_nacimiento' => $this->madre_fecha_nacimiento,
        ]);

        $query->andFilterWhere(['like', 'padre_nombre', $this->padre_nombre])
            ->andFilterWhere(['like', 'padre_apellido', $this->padre_apellido])
            ->andFilterWhere(['like', 'padre_ocupacion', $this->padre_ocupacion])
            ->andFilterWhere(['like', 'madre_nombre', $this->madre_nombre])
            ->andFilterWhere(['like', 'madre_apellido', $this->madre_apellido])
            ->andFilterWhere(['like', 'madre_ocupacion', $this->madre_ocupacion]);

        return $dataProvider;
    }
}
