<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "servicio_salud".
 *
 * @property int $id_servicioSalud
 * @property string $tipo_servicio
 *
 * @property Salud[] $saluds
 */
class ServicioSalud extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'servicio_salud';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_servicio'], 'required'],
            [['tipo_servicio'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_servicioSalud' => 'Id Servicio Salud',
            'tipo_servicio' => 'Tipo Servicio',
        ];
    }

    /**
     * Gets query for [[Saluds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaluds()
    {
        return $this->hasMany(Salud::class, ['id_servicioSalud' => 'id_servicioSalud']);
    }
}
