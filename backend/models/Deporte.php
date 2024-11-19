<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "deporte".
 *
 * @property int $id_deporte
 * @property string $tipo_deporte
 *
 * @property EjercicioYDeporte[] $ejercicioYDeportes
 */
class Deporte extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'deporte';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_deporte'], 'required'],
            [['tipo_deporte'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_deporte' => 'Id Deporte',
            'tipo_deporte' => 'Tipo Deporte',
        ];
    }

    /**
     * Gets query for [[EjercicioYDeportes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEjercicioYDeportes()
    {
        return $this->hasMany(EjercicioYDeporte::class, ['id_deporte' => 'id_deporte']);
    }
}
