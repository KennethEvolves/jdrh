<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "informacion_academica".
 *
 * @property int $inf_academica_id
 * @property string $estudio_adicional
 * @property int $horas_estudio_diario
 * @property string $actividad_extraescolar
 *
 * @property DatosGenerales[] $datosGenerales
 * @property OptMotivosEstudio[] $motivosEstudios
 * @property OptTemasCapacitacion[] $temasCapacitaciones
 * @property OptTalleresInteres[] $talleresInteres
 */
class InformacionAcademica extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'informacion_academica';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estudio_adicional', 'horas_estudio_diario', 'actividad_extraescolar'], 'required'],
            [['horas_estudio_diario'], 'integer'],
            [['estudio_adicional'], 'string', 'max' => 255],
            [['actividad_extraescolar'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'inf_academica_id' => 'Inf Academica ID',
            'estudio_adicional' => 'Estudio Adicional',
            'horas_estudio_diario' => 'Horas Estudio Diario',
            'actividad_extraescolar' => 'Actividad Extraescolar',
        ];
    }

    /**
     * Gets query for [[MotivosEstudios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMotivosEstudios()
    {
        return $this->hasMany(OptMotivosEstudio::class, ['motivo_id' => 'fk_motivo'])
            ->viaTable('inf_academica_motivos', ['fk_inf_academica' => 'inf_academica_id']);
    }

    /**
     * Gets query for [[TemasCapacitaciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTemasCapacitaciones()
    {
        return $this->hasMany(OptTemasCapacitacion::class, ['tema_id' => 'fk_tema'])
            ->viaTable('inf_academica_temas', ['fk_inf_academica' => 'inf_academica_id']);
    }

    /**
     * Gets query for [[TalleresInteres]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTalleresInteres()
    {
        return $this->hasMany(OptTalleresInteres::class, ['taller_id' => 'fk_taller'])
            ->viaTable('inf_academica_talleres', ['fk_inf_academica' => 'inf_academica_id']);
    }
}
