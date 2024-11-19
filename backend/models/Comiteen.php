<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "comiteen".
 *
 * @property int $id_comiteEN
 * @property string|null $tipo_comiteEN
 *
 * @property Salud[] $saluds
 */
class Comiteen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comiteen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_comiteEN'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_comiteEN' => 'Id Comite En',
            'tipo_comiteEN' => 'Tipo Comite En',
        ];
    }

    /**
     * Gets query for [[Saluds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaluds()
    {
        return $this->hasMany(Salud::class, ['id_comiteEN' => 'id_comiteEN']);
    }
}
