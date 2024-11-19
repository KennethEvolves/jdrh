<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipo_sangre".
 *
 * @property int $id_tipoSangre
 * @property string|null $tipo_sangre
 *
 * @property Salud[] $saluds
 */
class TipoSangre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_sangre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_sangre'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tipoSangre' => 'Id Tipo Sangre',
            'tipo_sangre' => 'Tipo Sangre',
        ];
    }

    /**
     * Gets query for [[Saluds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaluds()
    {
        return $this->hasMany(Salud::class, ['tipo_sangre_id_tipoSangre' => 'id_tipoSangre']);
    }
}
