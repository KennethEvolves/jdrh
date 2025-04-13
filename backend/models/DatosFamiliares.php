<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "datos_familiares".
 *
 * @property int $id_datosFamiliares
 * @property int $fk_estado_civil
 * @property string $padre_nombre
 * @property string $padre_apellido
 * @property string $padre_ocupacion
 * @property string $padre_fecha_nacimiento
 * @property string $madre_nombre
 * @property string $madre_apellido
 * @property string $madre_ocupacion
 * @property string $madre_fecha_nacimiento
 *
 * @property EstadoCivil $fkEstadoCivil
 */
class DatosFamiliares extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'datos_familiares';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_estado_civil', 'padre_nombre', 'padre_apellido', 'padre_ocupacion', 'padre_fecha_nacimiento', 'madre_nombre', 'madre_apellido', 'madre_ocupacion', 'madre_fecha_nacimiento'], 'required'],
            [['fk_estado_civil'], 'integer'],
            [['padre_fecha_nacimiento', 'madre_fecha_nacimiento'], 'safe'],
            [['padre_nombre', 'padre_apellido', 'padre_ocupacion', 'madre_nombre', 'madre_apellido', 'madre_ocupacion'], 'string', 'max' => 100],
            [['fk_estado_civil'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoCivil::class, 'targetAttribute' => ['fk_estado_civil' => 'estado_civil_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_datosFamiliares' => 'Id Datos Familiares',
            'fk_estado_civil' => 'Estado Civil',
            'padre_nombre' => 'Nombre del padre',
            'padre_apellido' => 'Apellido del padre',
            'padre_ocupacion' => 'Ocupacion del padre',
            'padre_fecha_nacimiento' => 'Fecha de nacimiento del padre',
            'madre_nombre' => 'Nombre de la madre',
            'madre_apellido' => 'Apellido de la madre',
            'madre_ocupacion' => 'Ocupacion de la madre',
            'madre_fecha_nacimiento' => 'Fecha de nacimiento de la madre',
        ];
    }

    /**
     * Gets query for [[FkEstadoCivil]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkEstadoCivil()
    {
        return $this->hasOne(EstadoCivil::class, ['estado_civil_id' => 'fk_estado_civil']);
    }
}
