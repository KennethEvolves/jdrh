<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Calificaciones;

/**
 * CalificacionesSearch represents the model behind the search form of `backend\models\Calificaciones`.
 */
class CalificacionesSearch extends Calificaciones
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_calificaciones', 'asistencia', 'usuario_alumno', 'usuario_docente'], 'integer'],
            [['nombre', 'rasgos_evaluar'], 'safe'],
            [['total'], 'number'],
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
        $query = Calificaciones::find();

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
            'id_calificaciones' => $this->id_calificaciones,
            'asistencia' => $this->asistencia,
            'total' => $this->total,
            'usuario_alumno' => $this->usuario_alumno,
            'usuario_docente' => $this->usuario_docente,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'rasgos_evaluar', $this->rasgos_evaluar]);

        return $dataProvider;
    }
}
