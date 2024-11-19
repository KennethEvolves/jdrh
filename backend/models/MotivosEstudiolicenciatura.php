<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "motivos_estudiolicenciatura".
 *
 * @property int $id_motivosEstudioLicenciatura
 * @property string|null $motivos Ampliación de conocimientos El interés que despierta en mí todo lo que estudio La satisfacción de obtener aprendizajes Evitar el fracaso Agradar a mis padres/familia Obtener mi título de Educación Superior Poder ejercer la docencia con vocación Obtener una plaza en el sistema educativo público Desarrollo profesional Crecimiento personal Estabilidad económica Influencias sociales y/o familiares Contribución a la sociedad Formación de futuras generaciones Curiosidad
 *
 * @property DatosGenerales[] $datosGenerales
 */
class MotivosEstudiolicenciatura extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'motivos_estudiolicenciatura';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_motivosEstudioLicenciatura'], 'required'],
            [['id_motivosEstudioLicenciatura'], 'integer'],
            [['motivos'], 'string', 'max' => 45],
            [['id_motivosEstudioLicenciatura'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_motivosEstudioLicenciatura' => 'Id Motivos Estudio Licenciatura',
            'motivos' => 'Motivos',
        ];
    }

    /**
     * Gets query for [[DatosGenerales]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDatosGenerales()
    {
        return $this->hasMany(DatosGenerales::class, ['id_motivosEstudioLicenciatura' => 'id_motivosEstudioLicenciatura']);
    }
}
