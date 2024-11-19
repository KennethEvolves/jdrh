<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bienes".
 *
 * @property int $id_bienes
 * @property string $tipos_bienes
 *
 * @property AmbienteSocioeconomico[] $ambienteSocioeconomicos
 */
class Bienes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bienes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipos_bienes'], 'required'],
            [['tipos_bienes'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bienes' => 'Id Bienes',
            'tipos_bienes' => 'Tipos Bienes',
        ];
    }

    /**
     * Gets query for [[AmbienteSocioeconomicos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAmbienteSocioeconomicos()
    {
        return $this->hasMany(AmbienteSocioeconomico::class, ['id_bienes' => 'id_bienes']);
    }
}
