<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "problemas_ultimo_semestre".
 *
 * @property int $id_problemasUltimoSemestre
 * @property string $tiene_problema
 * @property string $tipo_problema
 *
 * @property Salud[] $saluds
 */
class ProblemasUltimoSemestre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'problemas_ultimo_semestre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tiene_problema', 'tipo_problema'], 'required'],
            [['tiene_problema', 'tipo_problema'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_problemasUltimoSemestre' => 'Id Problemas Ultimo Semestre',
            'tiene_problema' => 'Tiene Problema',
            'tipo_problema' => 'Tipo Problema',
        ];
    }

    /**
     * Gets query for [[Saluds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaluds()
    {
        return $this->hasMany(Salud::class, ['id_problemasUltimoSemestre' => 'id_problemasUltimoSemestre']);
    }
}
