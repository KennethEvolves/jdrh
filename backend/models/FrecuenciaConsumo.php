<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "frecuencia_consumo".
 *
 * @property int $id_frecuenciaConsumo
 * @property string $tipo_alimento
 * @property int $id_escala
 *
 * @property Alimentacion[] $alimentacions
 * @property EscalaConsumo $escala
 */
class FrecuenciaConsumo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'frecuencia_consumo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_alimento', 'id_escala'], 'required'],
            [['id_escala'], 'integer'],
            [['tipo_alimento'], 'string', 'max' => 45],
            [['id_escala'], 'exist', 'skipOnError' => true, 'targetClass' => EscalaConsumo::class, 'targetAttribute' => ['id_escala' => 'id_escala']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_frecuenciaConsumo' => 'Id Frecuencia Consumo',
            'tipo_alimento' => 'Tipo Alimento',
            'id_escala' => 'Id Escala',
        ];
    }

    /**
     * Gets query for [[Alimentacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlimentacions()
    {
        return $this->hasMany(Alimentacion::class, ['id_frecuenciaConsumo' => 'id_frecuenciaConsumo']);
    }

    /**
     * Gets query for [[Escala]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEscala()
    {
        return $this->hasOne(EscalaConsumo::class, ['id_escala' => 'id_escala']);
    }
}
