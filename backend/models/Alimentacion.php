<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "alimentacion".
 *
 * @property int $idcomida
 *
 * @property Expediente[] $expedientes
 * @property FrecuenciaConsumo[] $frecuenciaConsumos
 * @property LugarComo[] $lugarComos
 */
class Alimentacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alimentacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcomida' => 'Idcomida',
        ];
    }

    /**
     * Gets query for [[Expedientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExpedientes()
    {
        return $this->hasMany(Expediente::class, ['id_comida' => 'idcomida']);
    }

    /**
     * Gets query for [[FrecuenciaConsumos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFrecuenciaConsumos()
    {
        return $this->hasMany(FrecuenciaConsumo::class, ['alimentacion_idcomida' => 'idcomida']);
    }

    /**
     * Gets query for [[LugarComos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLugarComos()
    {
        return $this->hasMany(LugarComo::class, ['alimentacion_idcomida' => 'idcomida']);
    }
}
