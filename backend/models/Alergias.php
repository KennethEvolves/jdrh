<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "alergias".
 *
 * @property int $id_alergias
 * @property string|null $tipo_alergias
 *
 * @property Salud[] $saluds
 */
class Alergias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alergias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_alergias'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_alergias' => 'Id Alergias',
            'tipo_alergias' => 'Tipo Alergias',
        ];
    }

    /**
     * Gets query for [[Saluds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaluds()
    {
        return $this->hasMany(Salud::class, ['id_alergias' => 'id_alergias']);
    }
}
