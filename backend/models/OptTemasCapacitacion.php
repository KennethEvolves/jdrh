<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "opt_temas_capacitacion".
 *
 * @property int $tema_id
 * @property string $nombre_tema
 *
 * @property InformacionAcademica[] $informacionAcademicas
 * @property InfAcademicaTemas[] $infAcademicaTemas
 */
class OptTemasCapacitacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'opt_temas_capacitacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_tema'], 'required'],
            [['nombre_tema'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tema_id' => 'Tema ID',
            'nombre_tema' => 'Nombre Tema',
        ];
    }

    /**
     * Gets query for [[InformacionAcademicas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInformacionAcademicas()
    {
        return $this->hasMany(InformacionAcademica::class, ['inf_academica_id' => 'fk_inf_academica'])
            ->viaTable('inf_academica_temas', ['fk_tema' => 'tema_id']);
    }

    /**
     * Gets query for [[InfAcademicaTemas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInfAcademicaTemas()
    {
        return $this->hasMany(InfAcademicaTemas::class, ['fk_tema' => 'tema_id']);
    }
}
