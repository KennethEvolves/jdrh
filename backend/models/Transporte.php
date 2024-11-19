<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "transporte".
 *
 * @property int $id_transporte
 * @property string $tipo_transporte
 *
 * @property AmbienteSocioeconomico[] $ambienteSocioeconomicos
 */
class Transporte extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transporte';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_transporte'], 'required'],
            [['tipo_transporte'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_transporte' => 'Id Transporte',
            'tipo_transporte' => 'Tipo Transporte',
        ];
    }

    /**
     * Gets query for [[AmbienteSocioeconomicos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAmbienteSocioeconomicos()
    {
        return $this->hasMany(AmbienteSocioeconomico::class, ['id_transporte' => 'id_transporte']);
    }
}
