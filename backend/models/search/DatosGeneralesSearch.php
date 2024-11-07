<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DatosGenerales;

/**
 * DatosGeneralesSearch represents the model behind the search form of `backend\models\DatosGenerales`.
 */
class DatosGeneralesSearch extends DatosGenerales
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iddatos_generales', 'id_expediente', 'capacitacion_previa', 'talleres_interes', 'tiempo_formacionIntegral', 'primera_opcion_licenciatura', 'cursas_eleccionLicenciatura', 'tiempo_estudio', 'id_motivosEstudioLicenciatura'], 'integer'],
            [['licenciatura', 'generacion', 'aspectos_sobresalientesEscuela', 'areas_oportunidadEscuela', 'preparatoria', 'estudios_adicionales', 'posible_licenciaturaGusto', 'proyectoVida_cincoAños', 'proyectoVida_diezAños', 'actividad_extracurricular', 'observaciones_sugerencias'], 'safe'],
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
        $query = DatosGenerales::find();

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
            'iddatos_generales' => $this->iddatos_generales,
            'id_expediente' => $this->id_expediente,
            'capacitacion_previa' => $this->capacitacion_previa,
            'talleres_interes' => $this->talleres_interes,
            'tiempo_formacionIntegral' => $this->tiempo_formacionIntegral,
            'primera_opcion_licenciatura' => $this->primera_opcion_licenciatura,
            'cursas_eleccionLicenciatura' => $this->cursas_eleccionLicenciatura,
            'tiempo_estudio' => $this->tiempo_estudio,
            'id_motivosEstudioLicenciatura' => $this->id_motivosEstudioLicenciatura,
        ]);

        $query->andFilterWhere(['like', 'licenciatura', $this->licenciatura])
            ->andFilterWhere(['like', 'generacion', $this->generacion])
            ->andFilterWhere(['like', 'aspectos_sobresalientesEscuela', $this->aspectos_sobresalientesEscuela])
            ->andFilterWhere(['like', 'areas_oportunidadEscuela', $this->areas_oportunidadEscuela])
            ->andFilterWhere(['like', 'preparatoria', $this->preparatoria])
            ->andFilterWhere(['like', 'estudios_adicionales', $this->estudios_adicionales])
            ->andFilterWhere(['like', 'posible_licenciaturaGusto', $this->posible_licenciaturaGusto])
            ->andFilterWhere(['like', 'proyectoVida_cincoAños', $this->proyectoVida_cincoAños])
            ->andFilterWhere(['like', 'proyectoVida_diezAños', $this->proyectoVida_diezAños])
            ->andFilterWhere(['like', 'actividad_extracurricular', $this->actividad_extracurricular])
            ->andFilterWhere(['like', 'observaciones_sugerencias', $this->observaciones_sugerencias]);

        return $dataProvider;
    }
}
