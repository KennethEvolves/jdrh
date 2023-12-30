<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "unidad_estudio".
 *
 * @property int $id_unidad
 * @property string|null $clave
 * @property string $nombre_asignatura
 * @property double|null $creditos_asignatura
 * @property string|null $des_general
 * @property string|null $ras_perfil
 * @property string|null $sabe_profesionales
 * @property string|null $elem_universo
 * @property int|null $num_momentos
 * @property string|null $satca
 * @property string|null $semestre
 * @property int $plan_estudios_id_plan
 * @property int $fases_id_fase
 *
 * @property Asignaciones[] $asignaciones
 * @property Fases $fasesIdFase
 * @property Momentos[] $momentos
 * @property PlanEstudios $planEstudiosIdPlan
 */
class UnidadEstudio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unidad_estudio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_asignatura', 'plan_estudios_id_plan', 'fases_id_fase'], 'required'],
            ['creditos_asignatura','double'],
            [['num_momentos', 'plan_estudios_id_plan', 'fases_id_fase'], 'integer'],
            [['des_general', 'ras_perfil', 'sabe_profesionales', 'elem_universo'], 'string'],
            [['clave', 'semestre'], 'string'],
            [['nombre_asignatura'], 'string'],
            [['satca'], 'string', 'max' => 15],
            [['fases_id_fase'], 'exist', 'skipOnError' => true, 'targetClass' => Fases::class, 'targetAttribute' => ['fases_id_fase' => 'id_fase']],
            [['plan_estudios_id_plan'], 'exist', 'skipOnError' => true, 'targetClass' => PlanEstudios::class, 'targetAttribute' => ['plan_estudios_id_plan' => 'id_plan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_unidad' => 'Id Unidad',
            'clave' => 'Clave',
            'nombre_asignatura' => 'Nombre Asignatura',
            'creditos_asignatura' => 'Creditos Asignatura',
            'des_general' => 'Des General',
            'ras_perfil' => 'Ras Perfil',
            'sabe_profesionales' => 'Sabe Profesionales',
            'elem_universo' => 'Elem Universo',
            'num_momentos' => 'Num Momentos',
            'satca' => 'Satca',
            'semestre' => 'Semestre',
            'plan_estudios_id_plan' => 'Plan Estudios Id Plan',
            'fases_id_fase' => 'Fases Id Fase',
        ];
    }

    /**
     * Gets query for [[Asignaciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAsignaciones()
    {
        return $this->hasMany(Asignaciones::class, ['unidad_estudio_id_unidad' => 'id_unidad']);
    }

    /**
     * Gets query for [[FasesIdFase]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFasesIdFase()
    {
        return $this->hasOne(Fases::class, ['id_fase' => 'fases_id_fase']);
    }

    /**
     * Gets query for [[Momentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMomentos()
    {
        return $this->hasMany(Momentos::class, ['unidad_estudio_id_unidad' => 'id_unidad']);
    }

    /**
     * Gets query for [[PlanEstudiosIdPlan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanEstudiosIdPlan()
    {
        return $this->hasOne(PlanEstudios::class, ['id_plan' => 'plan_estudios_id_plan']);
    }
}
