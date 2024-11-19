<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "intereses_personales".
 *
 * @property int $id_interesesPersonales
 * @property string|null $tipo_interesesPersonales
 *
 * @property RecreacionYTiempoLibre[] $recreacionYTiempoLibres
 */
class InteresesPersonales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'intereses_personales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_interesesPersonales'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_interesesPersonales' => 'Id Intereses Personales',
            'tipo_interesesPersonales' => 'Tipo Intereses Personales',
        ];
    }

    /**
     * Gets query for [[RecreacionYTiempoLibres]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecreacionYTiempoLibres()
    {
        return $this->hasMany(RecreacionYTiempoLibre::class, ['id_interesesPersonales' => 'id_interesesPersonales']);
    }
}
