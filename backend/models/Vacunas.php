<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "vacunas".
 *
 * @property int $id_vacunas
 * @property string|null $tipo_vacunas
 *
 * @property Salud[] $saluds
 */
class Vacunas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vacunas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_vacunas'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_vacunas' => 'Id Vacunas',
            'tipo_vacunas' => 'Tipo Vacunas',
        ];
    }

    /**
     * Gets query for [[Saluds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaluds()
    {
        return $this->hasMany(Salud::class, ['id_vacunas' => 'id_vacunas']);
    }
}
