<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "grado".
 *
 * @property int $id_grado
 * @property string $nombre
 *
 * @property Calificaciones[] $calificaciones
 * @property Inscripciones[] $inscripciones
 */
class Grado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_grado' => 'Id Grado',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[Calificaciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCalificaciones()
    {
        return $this->hasMany(Calificaciones::class, ['id_grado' => 'id_grado']);
    }

    /**
     * Gets query for [[Inscripciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInscripciones()
    {
        return $this->hasMany(Inscripciones::class, ['id_grado' => 'id_grado']);
    }
}
