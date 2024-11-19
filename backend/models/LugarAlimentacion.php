<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "lugar_alimentacion".
 *
 * @property int $id_lugarAlimentacion
 * @property string $tipo_lugar
 * @property int $id_escala
 *
 * @property Alimentacion[] $alimentacions
 */
class LugarAlimentacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lugar_alimentacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_lugar', 'id_escala'], 'required'],
            [['id_escala'], 'integer'],
            [['tipo_lugar'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_lugarAlimentacion' => 'Id Lugar Alimentacion',
            'tipo_lugar' => 'Tipo Lugar',
            'id_escala' => 'Id Escala',
        ];
    }

    /**
     * Gets query for [[Alimentacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlimentacions()
    {
        return $this->hasMany(Alimentacion::class, ['id_lugarAlimentacion' => 'id_lugarAlimentacion']);
    }
}
