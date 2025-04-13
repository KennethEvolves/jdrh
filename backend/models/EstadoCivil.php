<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "estado_civil".
 *
 * @property int $estado_civil_id
 * @property string $nombre_estado_civil
 *
 * @property DatosFamiliares[] $datosFamiliares
 */
class EstadoCivil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estado_civil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_estado_civil'], 'required'],
            [['nombre_estado_civil'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'estado_civil_id' => 'Estado Civil ID',
            'nombre_estado_civil' => 'Nombre Estado Civil',
        ];
    }

    /**
     * Gets query for [[DatosFamiliares]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDatosFamiliares()
    {
        return $this->hasMany(DatosFamiliares::class, ['fk_estado_civil' => 'estado_civil_id']);
    }
}
