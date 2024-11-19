<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "habitos".
 *
 * @property int $id_habitos
 * @property string $habito_fumar
 * @property string $num_cigarros
 * @property string $habito_alcohol
 * @property string $veces_semana
 * @property int $id_adicciones
 *
 * @property Adicciones $adicciones
 */
class Habitos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'habitos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['habito_fumar', 'num_cigarros', 'habito_alcohol', 'veces_semana', 'id_adicciones'], 'required'],
            [['id_adicciones'], 'integer'],
            [['habito_fumar', 'num_cigarros', 'habito_alcohol', 'veces_semana'], 'string', 'max' => 45],
            [['id_adicciones'], 'exist', 'skipOnError' => true, 'targetClass' => Adicciones::class, 'targetAttribute' => ['id_adicciones' => 'id_adicciones']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_habitos' => 'Id Habitos',
            'habito_fumar' => 'Habito Fumar',
            'num_cigarros' => 'Num Cigarros',
            'habito_alcohol' => 'Habito Alcohol',
            'veces_semana' => 'Veces Semana',
            'id_adicciones' => 'Id Adicciones',
        ];
    }

    /**
     * Gets query for [[Adicciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdicciones()
    {
        return $this->hasOne(Adicciones::class, ['id_adicciones' => 'id_adicciones']);
    }
}
