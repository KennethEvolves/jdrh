<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "frecuencia_dentista".
 *
 * @property int $id_frecuenciaDentista
 * @property string $frecuencia
 *
 * @property Salud[] $saluds
 */
class FrecuenciaDentista extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'frecuencia_dentista';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['frecuencia'], 'required'],
            [['frecuencia'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_frecuenciaDentista' => 'Id Frecuencia Dentista',
            'frecuencia' => 'Frecuencia',
        ];
    }

    /**
     * Gets query for [[Saluds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaluds()
    {
        return $this->hasMany(Salud::class, ['id_frecuenciaDentista' => 'id_frecuenciaDentista']);
    }
}
