<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "opt_talleres_interes".
 *
 * @property int $taller_id
 * @property string $nombre_taller
 *
 * @property InformacionAcademica[] $informacionAcademicas
 * @property InfAcademicaTalleres[] $infAcademicaTalleres
 */
class OptTalleresInteres extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'opt_talleres_interes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_taller'], 'required'],
            [['nombre_taller'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'taller_id' => 'Taller ID',
            'nombre_taller' => 'Nombre Taller',
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
            ->viaTable('inf_academica_talleres', ['fk_taller' => 'taller_id']);
    }

    /**
     * Gets query for [[InfAcademicaTalleres]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInfAcademicaTalleres()
    {
        return $this->hasMany(InfAcademicaTalleres::class, ['fk_taller' => 'taller_id']);
    }
}
