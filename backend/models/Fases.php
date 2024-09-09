<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "fases".
 *
 * @property int $id_fase
 * @property string $nombre
 *
 * @property UnidadEstudio[] $unidadEstudios
 */
class Fases extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fases';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_fase' => 'Id Fase',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[UnidadEstudios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnidadEstudios()
    {
        return $this->hasMany(UnidadEstudio::class, ['fases_id_fase' => 'id_fase']);
    }
}
