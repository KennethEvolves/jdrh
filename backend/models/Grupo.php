<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "grupo".
 *
 * @property int $id_grupo
 * @property string $nombre
 * @property int $capacidad
 * @property string|null $ubicacion
 *
 * @property Asignaciones[] $asignaciones
 */
class Grupo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grupo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'capacidad'], 'required'],
            [['capacidad'], 'integer'],
            [['ubicacion'], 'string'],
            [['nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_grupo' => 'Id Grupo',
            'nombre' => 'Nombre',
            'capacidad' => 'Capacidad',
            'ubicacion' => 'Ubicacion',
        ];
    }

    /**
     * Gets query for [[Asignaciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAsignaciones()
    {
        return $this->hasMany(Asignaciones::class, ['grupo_id_grupo' => 'id_grupo']);
    }
}
