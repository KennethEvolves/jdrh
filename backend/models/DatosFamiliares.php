<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "datos_familiares".
 *
 * @property int $iddatos_familiares
 * @property string|null $estado_civil
 * @property string|null $numero_hijos
 * @property string|null $edades_hijos
 * @property string $tipo_beca
 * @property string|null $dependencia_economica
 * @property string|null $dependientes_economico
 * @property string|null $empresa_trabajas
 * @property string|null $puesto_trabajas
 * @property string|null $horario_trabajas
 * @property int $id_civill
 * @property int $id_tiposbeca
 * @property int $id_familiares
 * @property int $id_tipo_dependientes
 *
 * @property TipoEstadocivil $civill
 * @property Expediente[] $expedientes
 * @property TipoDependencia $familiares
 * @property TipoDependientes $tipoDependientes
 * @property TiposBeca $tiposbeca
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
            [['tipo_beca', 'id_civill', 'id_tiposbeca', 'id_familiares', 'id_tipo_dependientes'], 'required'],
            [['id_civill', 'id_tiposbeca', 'id_familiares', 'id_tipo_dependientes'], 'integer'],
            [['estado_civil', 'numero_hijos', 'edades_hijos', 'dependencia_economica', 'dependientes_economico', 'empresa_trabajas', 'puesto_trabajas', 'horario_trabajas'], 'string', 'max' => 45],
            [['tipo_beca'], 'string', 'max' => 50],
            [['id_civill'], 'exist', 'skipOnError' => true, 'targetClass' => TipoEstadocivil::class, 'targetAttribute' => ['id_civill' => 'idtipo_estadocivil']],
            [['id_familiares'], 'exist', 'skipOnError' => true, 'targetClass' => TipoDependencia::class, 'targetAttribute' => ['id_familiares' => 'idtipo_dependencia']],
            [['id_tiposbeca'], 'exist', 'skipOnError' => true, 'targetClass' => TiposBeca::class, 'targetAttribute' => ['id_tiposbeca' => 'idtipos_beca']],
            [['id_tipo_dependientes'], 'exist', 'skipOnError' => true, 'targetClass' => TipoDependientes::class, 'targetAttribute' => ['id_tipo_dependientes' => 'idtipo_dependientes']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddatos_familiares' => 'Iddatos Familiares',
            'estado_civil' => 'Estado Civil',
            'numero_hijos' => 'Numero Hijos',
            'edades_hijos' => 'Edades Hijos',
            'tipo_beca' => 'Tipo Beca',
            'dependencia_economica' => 'Dependencia Economica',
            'dependientes_economico' => 'Dependientes Economico',
            'empresa_trabajas' => 'Empresa Trabajas',
            'puesto_trabajas' => 'Puesto Trabajas',
            'horario_trabajas' => 'Horario Trabajas',
            'id_civill' => 'Id Civill',
            'id_tiposbeca' => 'Id Tiposbeca',
            'id_familiares' => 'Id Familiares',
            'id_tipo_dependientes' => 'Id Tipo Dependientes',
        ];
    }

    /**
     * Gets query for [[Civill]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCivill()
    {
        return $this->hasOne(TipoEstadocivil::class, ['idtipo_estadocivil' => 'id_civill']);
    }

    /**
     * Gets query for [[Expedientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExpedientes()
    {
        return $this->hasMany(Expediente::class, ['id_familiares' => 'iddatos_familiares']);
    }

    /**
     * Gets query for [[Familiares]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFamiliares()
    {
        return $this->hasOne(TipoDependencia::class, ['idtipo_dependencia' => 'id_familiares']);
    }

    /**
     * Gets query for [[TipoDependientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoDependientes()
    {
        return $this->hasOne(TipoDependientes::class, ['idtipo_dependientes' => 'id_tipo_dependientes']);
    }

    /**
     * Gets query for [[Tiposbeca]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTiposbeca()
    {
        return $this->hasOne(TiposBeca::class, ['idtipos_beca' => 'id_tiposbeca']);
    }
}
