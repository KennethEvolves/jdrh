<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "afiliacion".
 *
 * @property int $id_afiliacionEscuela
 * @property string|null $tipo_afiliacion
 *
 * @property Salud[] $saluds
 */
class Afiliacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'afiliacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_afiliacion'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_afiliacionEscuela' => 'Id Afiliacion Escuela',
            'tipo_afiliacion' => 'Tipo Afiliacion',
        ];
    }

    /**
     * Gets query for [[Saluds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaluds()
    {
        return $this->hasMany(Salud::class, ['id_afiliacionEscuela' => 'id_afiliacionEscuela']);
    }
}
