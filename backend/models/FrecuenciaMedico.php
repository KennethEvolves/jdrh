<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "frecuencia_medico".
 *
 * @property int $id_frecuenciaMedico
 * @property string $frecuencia
 *
 * @property Salud[] $saluds
 */
class FrecuenciaMedico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'frecuencia_medico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['frecuencia'], 'required'],
            [['frecuencia'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_frecuenciaMedico' => 'Id Frecuencia Medico',
            'frecuencia' => 'Frecuencia',
        ];
    }

    /**
     * Gets query for [[Saluds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaluds()
    {
        return $this->hasMany(Salud::class, ['id_frecuenciaMedico' => 'id_frecuenciaMedico']);
    }
}
