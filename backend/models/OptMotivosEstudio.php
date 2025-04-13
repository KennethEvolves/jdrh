<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "opt_motivos_estudio".
 *
 * @property int $motivo_id
 * @property string|null $nombre_motivo
 *
 * @property InformacionAcademica[] $fkInfAcademicas
 * @property InfAcademicaMotivos[] $infAcademicaMotivos
 */
class OptMotivosEstudio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'opt_motivos_estudio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_motivo'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'motivo_id' => 'Motivo ID',
            'nombre_motivo' => 'Nombre Motivo',
        ];
    }

    /**
     * Gets query for [[FkInfAcademicas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkInfAcademicas()
    {
        return $this->hasMany(InformacionAcademica::class, ['inf_academica_id' => 'fk_inf_academica'])
        ->viaTable('inf_academica_motivos', ['fk_motivo' => 'motivo_id']);
    }

    /**
     * Gets query for [[InfAcademicaMotivos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInfAcademicaMotivos()
    {
        return $this->hasMany(InfAcademicaMotivos::class, ['fk_motivo' => 'motivo_id']);
    }

    public function getInformacionesAcademicas()
{
    return $this->hasMany(InformacionAcademica::class, ['inf_academica_id' => 'fk_inf_academica'])
        ->viaTable('inf_academica_motivos', ['fk_motivo' => 'motivo_id']);
}
}
