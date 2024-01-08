<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "carrera".
 *
 * @property int $id_carrera
 * @property string $nombre
 * @property string $clave
 * @property int|null $creditos
 * @property int|null $cred_serv_social
 * @property string|null $descripcion
 * @property string|null $carreracol
 *
 * @property PlanEstudios[] $planEstudios
 */
class Carrera extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carrera';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'clave'], 'required'],
            [['creditos', 'cred_serv_social'], 'integer'],
            [['descripcion','nombre'], 'string'],
            [['clave', 'carreracol'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_carrera' => 'Id Carrera',
            'nombre' => 'Nombre',
            'clave' => 'Clave',
            'creditos' => 'Creditos',
            'cred_serv_social' => 'Cred Serv Social',
            'descripcion' => 'Descripcion',
            'carreracol' => 'Carreracol',
        ];
    }

    /**
     * Gets query for [[PlanEstudios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanEstudios()
    {
        return $this->hasMany(PlanEstudios::class, ['carrera_id_carrera' => 'id_carrera']);
    }
}
