<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "lugar_acceso".
 *
 * @property int $id_lugarAcceso
 * @property string $tipo_acceso
 */
class LugarAcceso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lugar_acceso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_acceso'], 'required'],
            [['tipo_acceso'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_lugarAcceso' => 'Id Lugar Acceso',
            'tipo_acceso' => 'Tipo Acceso',
        ];
    }
}
