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
            [['iddatos_familiares', 'id_civill', 'id_tiposbeca', 'id_familiares', 'id_tipo_dependientes'], 'integer'],
            [['estado_civil', 'numero_hijos', 'edades_hijos', 'tipo_beca', 'dependencia_economica', 'dependientes_economico', 'empresa_trabajas', 'puesto_trabajas', 'horario_trabajas'], 'safe'],
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
            'iddatos_familiares' => $this->iddatos_familiares,
            'id_civill' => $this->id_civill,
            'id_tiposbeca' => $this->id_tiposbeca,
            'id_familiares' => $this->id_familiares,
            'id_tipo_dependientes' => $this->id_tipo_dependientes,
        ]);

        $query->andFilterWhere(['like', 'estado_civil', $this->estado_civil])
            ->andFilterWhere(['like', 'numero_hijos', $this->numero_hijos])
            ->andFilterWhere(['like', 'edades_hijos', $this->edades_hijos])
            ->andFilterWhere(['like', 'tipo_beca', $this->tipo_beca])
            ->andFilterWhere(['like', 'dependencia_economica', $this->dependencia_economica])
            ->andFilterWhere(['like', 'dependientes_economico', $this->dependientes_economico])
            ->andFilterWhere(['like', 'empresa_trabajas', $this->empresa_trabajas])
            ->andFilterWhere(['like', 'puesto_trabajas', $this->puesto_trabajas])
            ->andFilterWhere(['like', 'horario_trabajas', $this->horario_trabajas]);

        return $dataProvider;
    }
}
