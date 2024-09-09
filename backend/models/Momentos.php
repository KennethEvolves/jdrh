<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "momentos".
 *
 * @property int $id_momento
 * @property string $nombre
 * @property string $subtemas
 * @property string|null $act_aprendizaje
 * @property string|null $act_ensenanza
 * @property string|null $sugerencia_evaluacion
 * @property string|null $fuentes_aprendizaje
 * @property int $unidad_estudio_id_unidad
 *
 * @property UnidadEstudio $unidadEstudioIdUnidad
 */
class Momentos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'momentos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'subtemas', 'unidad_estudio_id_unidad'], 'required'],
            [['subtemas', 'act_aprendizaje', 'act_ensenanza', 'sugerencia_evaluacion', 'fuentes_aprendizaje'], 'string'],
            [['unidad_estudio_id_unidad'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
            [['unidad_estudio_id_unidad'], 'exist', 'skipOnError' => true, 'targetClass' => UnidadEstudio::class, 'targetAttribute' => ['unidad_estudio_id_unidad' => 'id_unidad']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_momento' => 'Id Momento',
            'nombre' => 'Nombre',
            'subtemas' => 'Subtemas',
            'act_aprendizaje' => 'Act Aprendizaje',
            'act_ensenanza' => 'Act Ensenanza',
            'sugerencia_evaluacion' => 'Sugerencia Evaluacion',
            'fuentes_aprendizaje' => 'Fuentes Aprendizaje',
            'unidad_estudio_id_unidad' => 'Unidad Estudio Id Unidad',
        ];
    }

    /**
     * Gets query for [[UnidadEstudioIdUnidad]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnidadEstudioIdUnidad()
    {
        return $this->hasOne(UnidadEstudio::class, ['id_unidad' => 'unidad_estudio_id_unidad']);
    }
}
