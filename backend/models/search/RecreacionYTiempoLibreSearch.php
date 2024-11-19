<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\RecreacionYTiempoLibre;

/**
 * RecreacionYTiempoLibreSearch represents the model behind the search form of `backend\models\RecreacionYTiempoLibre`.
 */
class RecreacionYTiempoLibreSearch extends RecreacionYTiempoLibre
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_recreacionTiempoLibre', 'id_lugarAcceso', 'id_participacionOrganizacion', 'id_interesesPersonales'], 'integer'],
            [['uso_internet', 'acceso_internet', 'cuestionamiento_usoInternet', 'areasInteres'], 'safe'],
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
        $query = RecreacionYTiempoLibre::find();

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
            'id_recreacionTiempoLibre' => $this->id_recreacionTiempoLibre,
            'id_lugarAcceso' => $this->id_lugarAcceso,
            'id_participacionOrganizacion' => $this->id_participacionOrganizacion,
            'id_interesesPersonales' => $this->id_interesesPersonales,
        ]);

        $query->andFilterWhere(['like', 'uso_internet', $this->uso_internet])
            ->andFilterWhere(['like', 'acceso_internet', $this->acceso_internet])
            ->andFilterWhere(['like', 'cuestionamiento_usoInternet', $this->cuestionamiento_usoInternet])
            ->andFilterWhere(['like', 'areasInteres', $this->areasInteres]);

        return $dataProvider;
    }
}
