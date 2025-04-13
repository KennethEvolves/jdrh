<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "percepcion_institucion".
 *
 * @property int $per_inst_id
 * @property string $aspectos_positivos
 * @property string $areas_oportunidad
 * @property string|null $observaciones
 *
 * @property DatosGenerales[] $datosGenerales
 */
class PercepcionInstitucion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'percepcion_institucion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aspectos_positivos', 'areas_oportunidad'], 'required'],
            [['aspectos_positivos', 'areas_oportunidad', 'observaciones'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'per_inst_id' => 'Per Inst ID',
            'aspectos_positivos' => 'Aspectos Positivos',
            'areas_oportunidad' => 'Areas Oportunidad',
            'observaciones' => 'Observaciones',
        ];
    }

    /**
     * Gets query for [[DatosGenerales]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDatosGenerales()
    {
        return $this->hasMany(DatosGenerales::class, ['fk_per_inst' => 'per_inst_id']);
    }
}
