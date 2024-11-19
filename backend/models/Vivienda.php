<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "vivienda".
 *
 * @property int $id_vivienda
 * @property string $tipo_vivienda
 *
 * @property AmbienteSocioeconomico[] $ambienteSocioeconomicos
 */
class Vivienda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vivienda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_vivienda'], 'required'],
            [['tipo_vivienda'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_vivienda' => 'Id Vivienda',
            'tipo_vivienda' => 'Tipo Vivienda',
        ];
    }

    /**
     * Gets query for [[AmbienteSocioeconomicos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAmbienteSocioeconomicos()
    {
        return $this->hasMany(AmbienteSocioeconomico::class, ['id_vivienda' => 'id_vivienda']);
    }
}
