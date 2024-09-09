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
            [['id_calificacion', 'id_docente', 'id_unidad_estudio', 'id_grado', 'id_grupo', 'id_periodo_semestral', 'id_alumno', 'porcentaje_asistencia'], 'integer'],
            [['calif_m1', 'calif_m2', 'promedio', 'proyecto_integrador', 'calif_final'], 'number'],
            [['id_generaciones'], 'safe'],
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
        if ($this->id_generaciones !== null && $this->id_generaciones !== '') {
            // Si id_generaciones no es null ni una cadena vacía, agrega la condición al query
            $query->andWhere(['id_generaciones' => $this->id_generaciones]);
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'id_calificacion' => $this->id_calificacion,
            'id_docente' => $this->id_docente,
            'id_unidad_estudio' => $this->id_unidad_estudio,
            'id_grado' => $this->id_grado,
            'id_grupo' => $this->id_grupo,
            'id_periodo_semestral' => $this->id_periodo_semestral,
            'id_alumno' => $this->id_alumno,
            'calif_m1' => $this->calif_m1,
            'calif_m2' => $this->calif_m2,
            'promedio' => $this->promedio,
            'proyecto_integrador' => $this->proyecto_integrador,
            'calif_final' => $this->calif_final,
            'porcentaje_asistencia' => $this->porcentaje_asistencia,
        ]);
        
        
        

        return $dataProvider;
    }
}
