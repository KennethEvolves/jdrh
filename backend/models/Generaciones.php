<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "generaciones".
 *
 * @property int $id_generacion
 * @property string $nombre
 * @property string $observacion
 *
 * @property Calificaciones[] $calificaciones
 */
class Generaciones extends \yii\db\ActiveRecord
{
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'generaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['observacion'], 'string'],
            [['nombre'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_generacion' => 'Id Generacion',
            'nombre' => 'Nombre',
            'observacion' => 'Observacion',
        ];
    }

    /**
     * Gets query for [[Calificaciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCalificaciones()
    {
        return $this->hasMany(Calificaciones::class, ['id_generaciones' => 'id_generacion']);
    }
}
