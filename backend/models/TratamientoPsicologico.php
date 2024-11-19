<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tratamiento_psicologico".
 *
 * @property int $id_tratamientoPsicologico
 * @property string $tipo_psicologo
 * @property string $tipo_tiempo
 * @property string $tipo_lugar
 *
 * @property Salud[] $saluds
 */
class TratamientoPsicologico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tratamiento_psicologico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_psicologo', 'tipo_tiempo', 'tipo_lugar'], 'required'],
            [['tipo_psicologo', 'tipo_tiempo', 'tipo_lugar'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tratamientoPsicologico' => 'Id Tratamiento Psicologico',
            'tipo_psicologo' => 'Tipo Psicologo',
            'tipo_tiempo' => 'Tipo Tiempo',
            'tipo_lugar' => 'Tipo Lugar',
        ];
    }

    /**
     * Gets query for [[Saluds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaluds()
    {
        return $this->hasMany(Salud::class, ['id_tratamientoPsicologico' => 'id_tratamientoPsicologico']);
    }
}
