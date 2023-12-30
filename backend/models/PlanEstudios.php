<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "plan_estudios".
 *
 * @property int $id_plan
 * @property string $nombre puede ser el plan: 2018 2022
 * @property string $fecha_autorizacion
 * @property string $vigencia
 * @property string $estado
 * @property string|null $observaciones
 * @property int $carrera_id_carrera
 *
 * @property Carrera $carreraIdCarrera
 * @property UnidadEstudio[] $unidadEstudios
 */
class PlanEstudios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plan_estudios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'fecha_autorizacion', 'vigencia', 'estado', 'carrera_id_carrera'], 'required'],
            [['fecha_autorizacion', 'vigencia'], 'safe'],
            [['observaciones'], 'string'],
            [['carrera_id_carrera'], 'integer'],
            [['nombre'], 'string', 'max' => 15],
            [['estado'], 'string', 'max' => 45],
            [['carrera_id_carrera'], 'exist', 'skipOnError' => true, 'targetClass' => Carrera::class, 'targetAttribute' => ['carrera_id_carrera' => 'id_carrera']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_plan' => 'Id Plan',
            'nombre' => 'Nombre',
            'fecha_autorizacion' => 'Fecha Autorizacion',
            'vigencia' => 'Vigencia',
            'estado' => 'Estado',
            'observaciones' => 'Observaciones',
            'carrera_id_carrera' => 'Carrera Id Carrera',
        ];
    }

    /**
     * Gets query for [[CarreraIdCarrera]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarreraIdCarrera()
    {
        return $this->hasOne(Carrera::class, ['id_carrera' => 'carrera_id_carrera']);
    }

    /**
     * Gets query for [[UnidadEstudios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnidadEstudios()
    {
        return $this->hasMany(UnidadEstudio::class, ['plan_estudios_id_plan' => 'id_plan']);
    }
}
