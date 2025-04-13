<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "licenciaturas".
 *
 * @property int $licenciatura_id
 * @property string $nombre_licenciatura
 * @property string $desc_licenciatura
 *
 * @property InformacionPersonal[] $informacionPersonals
 */
class Licenciaturas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'licenciaturas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
{
    return [
        [['nombre_licenciatura', 'desc_licenciatura'], 'required', 'message' => 'Por favor, llena este campo'],
        [['nombre_licenciatura', 'desc_licenciatura'], 'string', 'max' => 255],
    ];
}


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'licenciatura_id' => 'Licenciatura ID',
            'nombre_licenciatura' => 'Nombre de licenciatura',
            'desc_licenciatura' => 'Descripcion de licenciatura',
        ];
    }

    /**
     * Gets query for [[InformacionPersonals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInformacionPersonals()
    {
        return $this->hasMany(InformacionPersonal::class, ['fk_licenciatura' => 'licenciatura_id']);
    }
}
