<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "adicciones".
 *
 * @property int $id_adicciones
 * @property string $tipo_adicciones
 *
 * @property Habitos[] $habitos
 */
class Adicciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'adicciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_adicciones'], 'required'],
            [['tipo_adicciones'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_adicciones' => 'Id Adicciones',
            'tipo_adicciones' => 'Tipo Adicciones',
        ];
    }

    /**
     * Gets query for [[Habitos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHabitos()
    {
        return $this->hasMany(Habitos::class, ['id_adicciones' => 'id_adicciones']);
    }
}
