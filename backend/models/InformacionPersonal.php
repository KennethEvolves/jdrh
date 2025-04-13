<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "informacion_personal".
 *
 * @property int $inf_personal_id
 * @property int $fk_licenciatura
 * @property int $fk_ciclo_escolar
 * @property int $primera_opcion
 * @property int $eleccion_definitiva
 * @property string|null $otra_licenciatura
 * @property string $proyecto_5_anios
 * @property string $proyecto_10_anios
 *
 * @property DatosGenerales[] $datosGenerales
 * @property CicloEscolar $fkCicloEscolar
 * @property Licenciaturas $fkLicenciatura
 */
class InformacionPersonal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'informacion_personal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
{
    return [
        // Validar campos requeridos con mensajes personalizados
        [['fk_licenciatura', 'fk_ciclo_escolar', 'primera_opcion', 'eleccion_definitiva', 'proyecto_5_anios', 'proyecto_10_anios'], 'required', 'message' => 'Por favor, llena este campo.'],
        
        // Validar que fk_licenciatura y fk_ciclo_escolar sean enteros (selección válida del DropDownList)
        [['fk_licenciatura', 'fk_ciclo_escolar'], 'integer', 'message' => 'Selecciona una opción válida.'],
        
        // Validar que primera_opcion y eleccion_definitiva sean cadenas de texto con un límite de 255 caracteres
        [['primera_opcion', 'eleccion_definitiva'], 'string', 'max' => 255, 'tooLong' => 'Este campo no puede tener más de 255 caracteres.'],
        
        // Validar que los proyectos sean cadenas de texto
        [['proyecto_5_anios', 'proyecto_10_anios'], 'string', 'message' => 'Por favor, describe tu proyecto.'],
        
        // Validar que otra_licenciatura tenga una longitud máxima
        [['otra_licenciatura'], 'string', 'max' => 255, 'tooLong' => 'El nombre de la licenciatura no puede tener más de 255 caracteres.'],
        
        // Validar la existencia de fk_licenciatura en la tabla Licenciaturas
        [['fk_licenciatura'], 'exist', 'skipOnError' => true, 'targetClass' => Licenciaturas::class, 'targetAttribute' => ['fk_licenciatura' => 'licenciatura_id'], 'message' => 'La licenciatura seleccionada no es válida.'],
        
        // Validar la existencia de fk_ciclo_escolar en la tabla CicloEscolar
        [['fk_ciclo_escolar'], 'exist', 'skipOnError' => true, 'targetClass' => CicloEscolar::class, 'targetAttribute' => ['fk_ciclo_escolar' => 'ciclo_escolar_id'], 'message' => 'El ciclo escolar seleccionado no es válido.'],
    ];
}


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'inf_personal_id' => 'Inf Personal ID',
            'fk_licenciatura' => 'Fk Licenciatura',
            'fk_ciclo_escolar' => 'Fk Ciclo Escolar',
            'primera_opcion' => 'Primera opcion',
            'eleccion_definitiva' => 'Eleccion final',
            'otra_licenciatura' => 'Licenciatura extra',
            'proyecto_5_anios' => 'Proyecto 5 Años',
            'proyecto_10_anios' => 'Proyecto 10 Años',
        ];
    }

    /**
     * Gets query for [[DatosGenerales]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDatosGenerales()
    {
        return $this->hasMany(DatosGenerales::class, ['fk_inf_personal' => 'inf_personal_id']);
    }

    /**
     * Gets query for [[FkCicloEscolar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkCicloEscolar()
    {
        return $this->hasOne(CicloEscolar::class, ['ciclo_escolar_id' => 'fk_ciclo_escolar']);
    }

    /**
     * Gets query for [[FkLicenciatura]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkLicenciatura()
    {
        return $this->hasOne(Licenciaturas::class, ['licenciatura_id' => 'fk_licenciatura']);
    }
}
