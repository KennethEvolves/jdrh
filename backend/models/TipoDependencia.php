<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipo_dependencia".
 *
 * @property int $idtipo_dependencia
 * @property string|null $tipo
 *
 * @property DatosFamiliares[] $datosFamiliares
 */
class TipoDependencia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_dependencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idtipo_dependencia' => 'Idtipo Dependencia',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * Gets query for [[DatosFamiliares]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDatosFamiliares()
    {
        return $this->hasMany(DatosFamiliares::class, ['id_familiares' => 'idtipo_dependencia']);
    }
}
