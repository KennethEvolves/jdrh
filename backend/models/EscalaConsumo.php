<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "escala_consumo".
 *
 * @property int $id_escala
 * @property string $descripcion_frecuencia
 * @property string $valor_escala
 *
 * @property FrecuenciaConsumo[] $frecuenciaConsumos
 */
class EscalaConsumo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'escala_consumo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion_frecuencia', 'valor_escala'], 'required'],
            [['descripcion_frecuencia', 'valor_escala'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_escala' => 'Id Escala',
            'descripcion_frecuencia' => 'Descripcion Frecuencia',
            'valor_escala' => 'Valor Escala',
        ];
    }

    /**
     * Gets query for [[FrecuenciaConsumos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFrecuenciaConsumos()
    {
        return $this->hasMany(FrecuenciaConsumo::class, ['id_escala' => 'id_escala']);
    }
}
