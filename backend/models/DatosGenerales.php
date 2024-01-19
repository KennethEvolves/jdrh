<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "datos_generales".
 *
 * @property int $iddatos_generales
 * @property string|null $licenciatura
 * @property string|null $generacion
 * @property string|null $nombre_padre
 * @property string|null $ocupcion_padre
 * @property string|null $nombre_madre
 * @property string|null $ocupacion_madre
 * @property string|null $telefono
 * @property string|null $lugar_nacimiento
 *
 * @property Expediente[] $expedientes
 */
class DatosGenerales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'datos_generales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['licenciatura'], 'string'],
            [['generacion', 'nombre_padre', 'ocupcion_padre', 'nombre_madre', 'ocupacion_madre', 'telefono', 'lugar_nacimiento'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddatos_generales' => 'Iddatos Generales',
            'licenciatura' => 'Licenciatura',
            'generacion' => 'Generacion',
            'nombre_padre' => 'Nombre Padre',
            'ocupcion_padre' => 'Ocupcion Padre',
            'nombre_madre' => 'Nombre Madre',
            'ocupacion_madre' => 'Ocupacion Madre',
            'telefono' => 'Telefono',
            'lugar_nacimiento' => 'Lugar Nacimiento',
        ];
    }

    /**
     * Gets query for [[Expedientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExpedientes()
    {
        return $this->hasMany(Expediente::class, ['id_generales' => 'iddatos_generales']);
    }
}
