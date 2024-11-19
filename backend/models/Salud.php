<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "salud".
 *
 * @property int $id_salud
 * @property string $tratamiento_medico
 * @property int $tipo_sangre_id_tipoSangre
 * @property int $id_frecuenciaDentista
 * @property int $id_tratamientoPsicologico
 * @property int $id_servicioSalud
 * @property int $id_alergias
 * @property int $id_tratamientoPsiquiatrico
 * @property int $id_problemasUltimoSemestre
 * @property int $id_frecuenciaMedico
 * @property int $id_usoAnteojos
 * @property int $id_vacunas
 * @property int $id_afiliacionEscuela
 * @property int $id_comiteEN
 *
 * @property Afiliacion $afiliacionEscuela
 * @property Alergias $alergias
 * @property Comiteen $comiteEN
 * @property FrecuenciaDentista $frecuenciaDentista
 * @property FrecuenciaMedico $frecuenciaMedico
 * @property ProblemasUltimoSemestre $problemasUltimoSemestre
 * @property ServicioSalud $servicioSalud
 * @property TipoSangre $tipoSangreIdTipoSangre
 * @property TratamientoPsicologico $tratamientoPsicologico
 * @property TratamientoPsiquiatrico $tratamientoPsiquiatrico
 * @property UsoAnteojos $usoAnteojos
 * @property Vacunas $vacunas
 */
class Salud extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'salud';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tratamiento_medico', 'tipo_sangre_id_tipoSangre', 'id_frecuenciaDentista', 'id_tratamientoPsicologico', 'id_servicioSalud', 'id_alergias', 'id_tratamientoPsiquiatrico', 'id_problemasUltimoSemestre', 'id_frecuenciaMedico', 'id_usoAnteojos', 'id_vacunas', 'id_afiliacionEscuela', 'id_comiteEN'], 'required'],
            [['tipo_sangre_id_tipoSangre', 'id_frecuenciaDentista', 'id_tratamientoPsicologico', 'id_servicioSalud', 'id_alergias', 'id_tratamientoPsiquiatrico', 'id_problemasUltimoSemestre', 'id_frecuenciaMedico', 'id_usoAnteojos', 'id_vacunas', 'id_afiliacionEscuela', 'id_comiteEN'], 'integer'],
            [['tratamiento_medico'], 'string', 'max' => 45],
            [['tipo_sangre_id_tipoSangre'], 'exist', 'skipOnError' => true, 'targetClass' => TipoSangre::class, 'targetAttribute' => ['tipo_sangre_id_tipoSangre' => 'id_tipoSangre']],
            [['id_vacunas'], 'exist', 'skipOnError' => true, 'targetClass' => Vacunas::class, 'targetAttribute' => ['id_vacunas' => 'id_vacunas']],
            [['id_afiliacionEscuela'], 'exist', 'skipOnError' => true, 'targetClass' => Afiliacion::class, 'targetAttribute' => ['id_afiliacionEscuela' => 'id_afiliacionEscuela']],
            [['id_comiteEN'], 'exist', 'skipOnError' => true, 'targetClass' => Comiteen::class, 'targetAttribute' => ['id_comiteEN' => 'id_comiteEN']],
            [['id_frecuenciaDentista'], 'exist', 'skipOnError' => true, 'targetClass' => FrecuenciaDentista::class, 'targetAttribute' => ['id_frecuenciaDentista' => 'id_frecuenciaDentista']],
            [['id_tratamientoPsicologico'], 'exist', 'skipOnError' => true, 'targetClass' => TratamientoPsicologico::class, 'targetAttribute' => ['id_tratamientoPsicologico' => 'id_tratamientoPsicologico']],
            [['id_servicioSalud'], 'exist', 'skipOnError' => true, 'targetClass' => ServicioSalud::class, 'targetAttribute' => ['id_servicioSalud' => 'id_servicioSalud']],
            [['id_alergias'], 'exist', 'skipOnError' => true, 'targetClass' => Alergias::class, 'targetAttribute' => ['id_alergias' => 'id_alergias']],
            [['id_tratamientoPsiquiatrico'], 'exist', 'skipOnError' => true, 'targetClass' => TratamientoPsiquiatrico::class, 'targetAttribute' => ['id_tratamientoPsiquiatrico' => 'id_tratamientoPsiquiatrico']],
            [['id_problemasUltimoSemestre'], 'exist', 'skipOnError' => true, 'targetClass' => ProblemasUltimoSemestre::class, 'targetAttribute' => ['id_problemasUltimoSemestre' => 'id_problemasUltimoSemestre']],
            [['id_frecuenciaMedico'], 'exist', 'skipOnError' => true, 'targetClass' => FrecuenciaMedico::class, 'targetAttribute' => ['id_frecuenciaMedico' => 'id_frecuenciaMedico']],
            [['id_usoAnteojos'], 'exist', 'skipOnError' => true, 'targetClass' => UsoAnteojos::class, 'targetAttribute' => ['id_usoAnteojos' => 'id_usoAnteojos']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_salud' => 'Id Salud',
            'tratamiento_medico' => 'Tratamiento Medico',
            'tipo_sangre_id_tipoSangre' => 'Tipo Sangre Id Tipo Sangre',
            'id_frecuenciaDentista' => 'Id Frecuencia Dentista',
            'id_tratamientoPsicologico' => 'Id Tratamiento Psicologico',
            'id_servicioSalud' => 'Id Servicio Salud',
            'id_alergias' => 'Id Alergias',
            'id_tratamientoPsiquiatrico' => 'Id Tratamiento Psiquiatrico',
            'id_problemasUltimoSemestre' => 'Id Problemas Ultimo Semestre',
            'id_frecuenciaMedico' => 'Id Frecuencia Medico',
            'id_usoAnteojos' => 'Id Uso Anteojos',
            'id_vacunas' => 'Id Vacunas',
            'id_afiliacionEscuela' => 'Id Afiliacion Escuela',
            'id_comiteEN' => 'Id Comite En',
        ];
    }

    /**
     * Gets query for [[AfiliacionEscuela]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAfiliacionEscuela()
    {
        return $this->hasOne(Afiliacion::class, ['id_afiliacionEscuela' => 'id_afiliacionEscuela']);
    }

    /**
     * Gets query for [[Alergias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlergias()
    {
        return $this->hasOne(Alergias::class, ['id_alergias' => 'id_alergias']);
    }

    /**
     * Gets query for [[ComiteEN]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComiteEN()
    {
        return $this->hasOne(Comiteen::class, ['id_comiteEN' => 'id_comiteEN']);
    }

    /**
     * Gets query for [[FrecuenciaDentista]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFrecuenciaDentista()
    {
        return $this->hasOne(FrecuenciaDentista::class, ['id_frecuenciaDentista' => 'id_frecuenciaDentista']);
    }

    /**
     * Gets query for [[FrecuenciaMedico]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFrecuenciaMedico()
    {
        return $this->hasOne(FrecuenciaMedico::class, ['id_frecuenciaMedico' => 'id_frecuenciaMedico']);
    }

    /**
     * Gets query for [[ProblemasUltimoSemestre]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProblemasUltimoSemestre()
    {
        return $this->hasOne(ProblemasUltimoSemestre::class, ['id_problemasUltimoSemestre' => 'id_problemasUltimoSemestre']);
    }

    /**
     * Gets query for [[ServicioSalud]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServicioSalud()
    {
        return $this->hasOne(ServicioSalud::class, ['id_servicioSalud' => 'id_servicioSalud']);
    }

    /**
     * Gets query for [[TipoSangreIdTipoSangre]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoSangreIdTipoSangre()
    {
        return $this->hasOne(TipoSangre::class, ['id_tipoSangre' => 'tipo_sangre_id_tipoSangre']);
    }

    /**
     * Gets query for [[TratamientoPsicologico]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTratamientoPsicologico()
    {
        return $this->hasOne(TratamientoPsicologico::class, ['id_tratamientoPsicologico' => 'id_tratamientoPsicologico']);
    }

    /**
     * Gets query for [[TratamientoPsiquiatrico]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTratamientoPsiquiatrico()
    {
        return $this->hasOne(TratamientoPsiquiatrico::class, ['id_tratamientoPsiquiatrico' => 'id_tratamientoPsiquiatrico']);
    }

    /**
     * Gets query for [[UsoAnteojos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsoAnteojos()
    {
        return $this->hasOne(UsoAnteojos::class, ['id_usoAnteojos' => 'id_usoAnteojos']);
    }

    /**
     * Gets query for [[Vacunas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVacunas()
    {
        return $this->hasOne(Vacunas::class, ['id_vacunas' => 'id_vacunas']);
    }
}
