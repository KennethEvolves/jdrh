<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipo_estadocivil".
 *
 * @property int $idtipo_estadocivil
 * @property string|null $descripcion
 *
 * @property DatosFamiliares[] $datosFamiliares
 */
class TipoEstadocivil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_estadocivil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idtipo_estadocivil' => 'Idtipo Estadocivil',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[DatosFamiliares]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDatosFamiliares()
    {
        return $this->hasMany(DatosFamiliares::class, ['id_civill' => 'idtipo_estadocivil']);
    }
}
