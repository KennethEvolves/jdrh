<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "periodo_semestral".
 *
 * @property int $id_ciclo
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $periodo
 * @property int $semanas
 * @property string $estado
 * @property string|null $descripcion
 *
 * @property Asignaciones[] $asignaciones
 */
class PeriodoSemestral extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'periodo_semestral';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_inicio', 'fecha_fin', 'periodo', 'semanas', 'estado'], 'required'],
            [['fecha_inicio', 'fecha_fin', 'periodo'], 'safe'],
            [['semanas'], 'integer'],
            [['descripcion'], 'string'],
            [['estado'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ciclo' => 'Id Ciclo',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'periodo' => 'Periodo',
            'semanas' => 'Semanas',
            'estado' => 'Estado',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[Asignaciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAsignaciones()
    {
        return $this->hasMany(Asignaciones::class, ['periodo_semestral_id_ciclo' => 'id_ciclo']);
    }
}
