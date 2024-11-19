<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "uso_personal".
 *
 * @property int $id_usoPersonal
 * @property string|null $tipo_usoPersonal
 *
 * @property AmbienteSocioeconomico[] $ambienteSocioeconomicos
 */
class UsoPersonal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uso_personal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_usoPersonal'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_usoPersonal' => 'Id Uso Personal',
            'tipo_usoPersonal' => 'Tipo Uso Personal',
        ];
    }

    /**
     * Gets query for [[AmbienteSocioeconomicos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAmbienteSocioeconomicos()
    {
        return $this->hasMany(AmbienteSocioeconomico::class, ['id_usoPersonal' => 'id_usoPersonal']);
    }
}
