<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ciclo_escolar".
 *
 * @property int $ciclo_escolar_id
 * @property string $nombre_ciclo_escolar
 * @property int $año_inicio
 * @property int $año_fin
 *
 * @property InformacionPersonal[] $informacionPersonals
 */
class CicloEscolar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ciclo_escolar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_ciclo_escolar', 'año_inicio', 'año_fin'], 'required', 'message' => 'Por favor, llena este campo'],
            [['año_inicio'], 'integer', 'message' => 'El año de inicio debe ser un número válido.'],
            [['año_fin'], 'integer', 'message' => 'El año de fin debe ser un número válido.'],
            [['nombre_ciclo_escolar'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ciclo_escolar_id' => 'Ciclo Escolar ID',
            'nombre_ciclo_escolar' => 'Nombre ciclo escolar',
            'año_inicio' => 'Año inicio',
            'año_fin' => 'Año fin',
        ];
    }

    /**
     * Gets query for [[InformacionPersonals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInformacionPersonals()
    {
        return $this->hasMany(InformacionPersonal::class, ['fk_ciclo_escolar' => 'ciclo_escolar_id']);
    }
}
