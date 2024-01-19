<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Asignaciones;

/**
 * AsignacionesSearch represents the model behind the search form of `backend\models\Asignaciones`.
 */
class AsignacionesSearch extends Asignaciones
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['grupo_id_grupo', 'periodo_semestral_id_ciclo', 'unidad_estudio_id_unidad', 'usuario_idusuario'], 'integer'],
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
        $query = Asignaciones::find();

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
            'grupo_id_grupo' => $this->grupo_id_grupo,
            'periodo_semestral_id_ciclo' => $this->periodo_semestral_id_ciclo,
            'unidad_estudio_id_unidad' => $this->unidad_estudio_id_unidad,
            'usuario_idusuario' => $this->usuario_idusuario,
        ]);

        return $dataProvider;
    }
}
