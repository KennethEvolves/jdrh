<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Carrera;

/**
 * CarreraSearch represents the model behind the search form of `backend\models\Carrera`.
 */
class CarreraSearch extends Carrera
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_carrera', 'creditos', 'cred_serv_social'], 'integer'],
            [['nombre', 'clave', 'descripcion', 'carreracol'], 'safe'],
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
        $query = Carrera::find();

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
            'id_carrera' => $this->id_carrera,
            'creditos' => $this->creditos,
            'cred_serv_social' => $this->cred_serv_social,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'clave', $this->clave])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'carreracol', $this->carreracol]);

        return $dataProvider;
    }
}
