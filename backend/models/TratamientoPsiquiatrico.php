<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tratamiento_psiquiatrico".
 *
 * @property int $id_tratamientoPsiquiatrico
 * @property string $tipo_psiquiatra
 * @property string $tipo_tiempo
 * @property string $tipo_lugar
 *
 * @property Salud[] $saluds
 */
class TratamientoPsiquiatrico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tratamiento_psiquiatrico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_psiquiatra', 'tipo_tiempo', 'tipo_lugar'], 'required'],
            [['tipo_psiquiatra', 'tipo_tiempo', 'tipo_lugar'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tratamientoPsiquiatrico' => 'Id Tratamiento Psiquiatrico',
            'tipo_psiquiatra' => 'Tipo Psiquiatra',
            'tipo_tiempo' => 'Tipo Tiempo',
            'tipo_lugar' => 'Tipo Lugar',
        ];
    }

    /**
     * Gets query for [[Saluds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaluds()
    {
        return $this->hasMany(Salud::class, ['id_tratamientoPsiquiatrico' => 'id_tratamientoPsiquiatrico']);
    }
}
