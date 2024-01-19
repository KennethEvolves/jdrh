<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipos_beca".
 *
 * @property int $idtipos_beca
 * @property string|null $nombre
 *
 * @property DatosFamiliares[] $datosFamiliares
 */
class TiposBeca extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipos_beca';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idtipos_beca' => 'Idtipos Beca',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[DatosFamiliares]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDatosFamiliares()
    {
        return $this->hasMany(DatosFamiliares::class, ['id_tiposbeca' => 'idtipos_beca']);
    }
}
