<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "organizacion".
 *
 * @property int $id_participacionOrganizacion
 * @property string $tipo_organizacion
 */
class Organizacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_organizacion'], 'required'],
            [['tipo_organizacion'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_participacionOrganizacion' => 'Id Participacion Organizacion',
            'tipo_organizacion' => 'Tipo Organizacion',
        ];
    }
}
