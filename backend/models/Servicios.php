<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "servicios".
 *
 * @property int $id_servicios
 * @property string $tipo_servicios
 *
 * @property AmbienteSocioeconomico[] $ambienteSocioeconomicos
 */
class Servicios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'servicios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_servicios'], 'required'],
            [['tipo_servicios'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_servicios' => 'Id Servicios',
            'tipo_servicios' => 'Tipo Servicios',
        ];
    }

    /**
     * Gets query for [[AmbienteSocioeconomicos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAmbienteSocioeconomicos()
    {
        return $this->hasMany(AmbienteSocioeconomico::class, ['id_servicios' => 'id_servicios']);
    }
}
