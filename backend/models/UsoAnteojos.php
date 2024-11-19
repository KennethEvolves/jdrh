<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "uso_anteojos".
 *
 * @property int $id_usoAnteojos
 * @property string $uso
 *
 * @property Salud[] $saluds
 */
class UsoAnteojos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uso_anteojos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uso'], 'required'],
            [['uso'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_usoAnteojos' => 'Id Uso Anteojos',
            'uso' => 'Uso',
        ];
    }

    /**
     * Gets query for [[Saluds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaluds()
    {
        return $this->hasMany(Salud::class, ['id_usoAnteojos' => 'id_usoAnteojos']);
    }
}
