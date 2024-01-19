<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipo_dependientes".
 *
 * @property int $idtipo_dependientes
 * @property string|null $tipo
 *
 * @property DatosFamiliares[] $datosFamiliares
 */
class TipoDependientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_dependientes';
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
            'idtipo_dependientes' => 'Idtipo Dependientes',
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
        return $this->hasMany(DatosFamiliares::class, ['id_tipo_dependientes' => 'idtipo_dependientes']);
    }
}
