<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "datos_generales".
 *
 * @property int $iddatos_generales
 * @property string|null $licenciatura
 * @property string|null $generacion
 * @property int $id_expediente
 * @property int|null $capacitacion_previa
 * @property int|null $talleres_interes
 * @property int|null $tiempo_formacionIntegral
 * @property string|null $aspectos_sobresalientesEscuela
 * @property string|null $areas_oportunidadEscuela
 * @property string|null $preparatoria
 * @property string|null $estudios_adicionales
 * @property int|null $primera_opcion_licenciatura
 * @property int|null $cursas_eleccionLicenciatura
 * @property string|null $posible_licenciaturaGusto
 * @property string|null $proyectoVida_cincoAños
 * @property string|null $proyectoVida_diezAños
 * @property string|null $actividad_extracurricular
 * @property string|null $observaciones_sugerencias
 * @property int|null $tiempo_estudio
 * @property int|null $id_motivosEstudioLicenciatura
 *
 * @property Expediente $expediente
 * @property MotivosEstudiolicenciatura $motivosEstudioLicenciatura
 */
class DatosGenerales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'datos_generales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['licenciatura'], 'string'],
            [['id_expediente'], 'required'],
            [['id_expediente', 'capacitacion_previa', 'talleres_interes', 'tiempo_formacionIntegral', 'primera_opcion_licenciatura', 'cursas_eleccionLicenciatura', 'tiempo_estudio', 'id_motivosEstudioLicenciatura'], 'integer'],
            [['generacion', 'aspectos_sobresalientesEscuela', 'areas_oportunidadEscuela', 'preparatoria', 'estudios_adicionales', 'posible_licenciaturaGusto', 'proyectoVida_cincoAños', 'proyectoVida_diezAños', 'actividad_extracurricular', 'observaciones_sugerencias'], 'string', 'max' => 45],
            [['id_expediente'], 'exist', 'skipOnError' => true, 'targetClass' => Expediente::class, 'targetAttribute' => ['id_expediente' => 'idexpediente']],
            [['id_motivosEstudioLicenciatura'], 'exist', 'skipOnError' => true, 'targetClass' => MotivosEstudiolicenciatura::class, 'targetAttribute' => ['id_motivosEstudioLicenciatura' => 'id_motivosEstudioLicenciatura']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddatos_generales' => 'Iddatos Generales',
            'licenciatura' => 'Licenciatura',
            'generacion' => 'Generacion',
            'id_expediente' => 'Id Expediente',
            'capacitacion_previa' => 'Capacitacion Previa',
            'talleres_interes' => 'Talleres Interes',
            'tiempo_formacionIntegral' => 'Tiempo Formacion Integral',
            'aspectos_sobresalientesEscuela' => 'Aspectos Sobresalientes Escuela',
            'areas_oportunidadEscuela' => 'Areas Oportunidad Escuela',
            'preparatoria' => 'Preparatoria',
            'estudios_adicionales' => 'Estudios Adicionales',
            'primera_opcion_licenciatura' => 'Primera Opcion Licenciatura',
            'cursas_eleccionLicenciatura' => 'Cursas Eleccion Licenciatura',
            'posible_licenciaturaGusto' => 'Posible Licenciatura Gusto',
            'proyectoVida_cincoAños' => 'Proyecto Vida Cinco Años',
            'proyectoVida_diezAños' => 'Proyecto Vida Diez Años',
            'actividad_extracurricular' => 'Actividad Extracurricular',
            'observaciones_sugerencias' => 'Observaciones Sugerencias',
            'tiempo_estudio' => 'Tiempo Estudio',
            'id_motivosEstudioLicenciatura' => 'Id Motivos Estudio Licenciatura',
        ];
    }

    /**
     * Gets query for [[Expediente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExpediente()
    {
        return $this->hasOne(Expediente::class, ['idexpediente' => 'id_expediente']);
    }

    /**
     * Gets query for [[MotivosEstudioLicenciatura]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMotivosEstudioLicenciatura()
    {
        return $this->hasOne(MotivosEstudiolicenciatura::class, ['id_motivosEstudioLicenciatura' => 'id_motivosEstudioLicenciatura']);
    }
}
