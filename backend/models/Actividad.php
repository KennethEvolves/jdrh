<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "actividad".
 *
 * @property int $id_actividad
 * @property string $tipo_actividad
 *
 * @property EjercicioYDeporte[] $ejercicioYDeportes
 */
class Actividad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'actividad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_actividad'], 'required'],
            [['tipo_actividad'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_actividad' => 'Id Actividad',
            'tipo_actividad' => 'Tipo Actividad',
        ];
    }

    /**
     * Gets query for [[EjercicioYDeportes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEjercicioYDeportes()
    {
        return $this->hasMany(EjercicioYDeporte::class, ['id_actividad' => 'id_actividad']);
    }
}
