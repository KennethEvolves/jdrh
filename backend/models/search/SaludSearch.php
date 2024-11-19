<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Salud;

/**
 * SaludSearch represents the model behind the search form of `backend\models\Salud`.
 */
class SaludSearch extends Salud
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_salud', 'tipo_sangre_id_tipoSangre', 'id_frecuenciaDentista', 'id_tratamientoPsicologico', 'id_servicioSalud', 'id_alergias', 'id_tratamientoPsiquiatrico', 'id_problemasUltimoSemestre', 'id_frecuenciaMedico', 'id_usoAnteojos', 'id_vacunas', 'id_afiliacionEscuela', 'id_comiteEN'], 'integer'],
            [['tratamiento_medico'], 'safe'],
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
        $query = Salud::find();

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
            'id_salud' => $this->id_salud,
            'tipo_sangre_id_tipoSangre' => $this->tipo_sangre_id_tipoSangre,
            'id_frecuenciaDentista' => $this->id_frecuenciaDentista,
            'id_tratamientoPsicologico' => $this->id_tratamientoPsicologico,
            'id_servicioSalud' => $this->id_servicioSalud,
            'id_alergias' => $this->id_alergias,
            'id_tratamientoPsiquiatrico' => $this->id_tratamientoPsiquiatrico,
            'id_problemasUltimoSemestre' => $this->id_problemasUltimoSemestre,
            'id_frecuenciaMedico' => $this->id_frecuenciaMedico,
            'id_usoAnteojos' => $this->id_usoAnteojos,
            'id_vacunas' => $this->id_vacunas,
            'id_afiliacionEscuela' => $this->id_afiliacionEscuela,
            'id_comiteEN' => $this->id_comiteEN,
        ]);

        $query->andFilterWhere(['like', 'tratamiento_medico', $this->tratamiento_medico]);

        return $dataProvider;
    }
}
