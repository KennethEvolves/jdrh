<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "alimentacion".
 *
 * @property int $id_alimentacion
 * @property int $id_lugarAlimentacion
 * @property int $id_frecuenciaConsumo
 *
 * @property FrecuenciaConsumo $frecuenciaConsumo
 * @property LugarAlimentacion $lugarAlimentacion
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
        return [
            [['id_lugarAlimentacion', 'id_frecuenciaConsumo'], 'required'],
            [['id_lugarAlimentacion', 'id_frecuenciaConsumo'], 'integer'],
            [['id_frecuenciaConsumo'], 'exist', 'skipOnError' => true, 'targetClass' => FrecuenciaConsumo::class, 'targetAttribute' => ['id_frecuenciaConsumo' => 'id_frecuenciaConsumo']],
            [['id_lugarAlimentacion'], 'exist', 'skipOnError' => true, 'targetClass' => LugarAlimentacion::class, 'targetAttribute' => ['id_lugarAlimentacion' => 'id_lugarAlimentacion']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_alimentacion' => 'Id Alimentacion',
            'id_lugarAlimentacion' => 'Id Lugar Alimentacion',
            'id_frecuenciaConsumo' => 'Id Frecuencia Consumo',
        ];
    }

    /**
     * Gets query for [[FrecuenciaConsumo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFrecuenciaConsumo()
    {
        return $this->hasOne(FrecuenciaConsumo::class, ['id_frecuenciaConsumo' => 'id_frecuenciaConsumo']);
    }

    /**
     * Gets query for [[LugarAlimentacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLugarAlimentacion()
    {
        return $this->hasOne(LugarAlimentacion::class, ['id_lugarAlimentacion' => 'id_lugarAlimentacion']);
    }
}
