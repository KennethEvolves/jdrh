<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "usos_internet".
 *
 * @property int $idusos_internet
 * @property string $descripcion
 *
 * @property RecreacionLibre[] $recreacionLibres
 */
class UsosInternet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usos_internet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idusos_internet' => 'Idusos Internet',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[RecreacionLibres]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecreacionLibres()
    {
        return $this->hasMany(RecreacionLibre::class, ['usos_internet' => 'idusos_internet']);
    }
}
