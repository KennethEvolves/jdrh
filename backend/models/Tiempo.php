<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tiempo".
 *
 * @property int $id_tiempo
 * @property string $tiempo_llegada
 *
 * @property AmbienteSocioeconomico[] $ambienteSocioeconomicos
 */
class Tiempo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tiempo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tiempo_llegada'], 'required'],
            [['tiempo_llegada'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tiempo' => 'Id Tiempo',
            'tiempo_llegada' => 'Tiempo Llegada',
        ];
    }

    /**
     * Gets query for [[AmbienteSocioeconomicos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAmbienteSocioeconomicos()
    {
        return $this->hasMany(AmbienteSocioeconomico::class, ['id_tiempo' => 'id_tiempo']);
    }
}
