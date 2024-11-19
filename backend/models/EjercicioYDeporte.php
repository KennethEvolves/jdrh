<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ejercicio_y_deporte".
 *
 * @property int $id_ejercicioDeporte
 * @property string $veces_ejercicio
 * @property int $id_actividad
 * @property int $id_deporte
 *
 * @property Actividad $actividad
 * @property Deporte $deporte
 */
class EjercicioYDeporte extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ejercicio_y_deporte';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['veces_ejercicio', 'id_actividad', 'id_deporte'], 'required'],
            [['id_actividad', 'id_deporte'], 'integer'],
            [['veces_ejercicio'], 'string', 'max' => 45],
            [['id_actividad'], 'exist', 'skipOnError' => true, 'targetClass' => Actividad::class, 'targetAttribute' => ['id_actividad' => 'id_actividad']],
            [['id_deporte'], 'exist', 'skipOnError' => true, 'targetClass' => Deporte::class, 'targetAttribute' => ['id_deporte' => 'id_deporte']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ejercicioDeporte' => 'Id Ejercicio Deporte',
            'veces_ejercicio' => 'Veces Ejercicio',
            'id_actividad' => 'Id Actividad',
            'id_deporte' => 'Id Deporte',
        ];
    }

    /**
     * Gets query for [[Actividad]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActividad()
    {
        return $this->hasOne(Actividad::class, ['id_actividad' => 'id_actividad']);
    }

    /**
     * Gets query for [[Deporte]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeporte()
    {
        return $this->hasOne(Deporte::class, ['id_deporte' => 'id_deporte']);
    }
}
