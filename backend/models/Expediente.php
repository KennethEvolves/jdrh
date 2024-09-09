<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "expediente".
 *
 * @property int $idexpediente
 * @property int|null $id_tutor
 * @property int|null $id_generacion
 * @property int|null $id_grupocreado
 * @property string $fecha_elaboracion
 * @property string $fecha_actualizacion
 *
 * @property DatosGenerales[] $datosGenerales
 * @property Generaciones $generacion
 * @property GrupoCreado $grupocreado
 * @property User $tutor
 */
class Expediente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'expediente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tutor', 'id_generacion', 'id_grupocreado'], 'integer'],
            [['fecha_elaboracion', 'fecha_actualizacion'], 'required'],
            [['fecha_elaboracion', 'fecha_actualizacion'], 'safe'],
            [['id_tutor'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_tutor' => 'id']],
            [['id_generacion'], 'exist', 'skipOnError' => true, 'targetClass' => Generaciones::class, 'targetAttribute' => ['id_generacion' => 'id_generacion']],
            [['id_grupocreado'], 'exist', 'skipOnError' => true, 'targetClass' => GrupoCreado::class, 'targetAttribute' => ['id_grupocreado' => 'id_grupocreado']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idexpediente' => 'Idexpediente',
            'id_tutor' => 'Id Tutor',
            'id_generacion' => 'Id Generacion',
            'id_grupocreado' => 'Id Grupocreado',
            'fecha_elaboracion' => 'Fecha Elaboracion',
            'fecha_actualizacion' => 'Fecha Actualizacion',
        ];
    }

    /**
     * Gets query for [[DatosGenerales]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDatosGenerales()
    {
        return $this->hasMany(DatosGenerales::class, ['id_expediente' => 'idexpediente']);
    }

    /**
     * Gets query for [[Generacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGeneracion()
    {
        return $this->hasOne(Generaciones::class, ['id_generacion' => 'id_generacion']);
    }

    /**
     * Gets query for [[Grupocreado]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrupocreado()
    {
        return $this->hasOne(GrupoCreado::class, ['id_grupocreado' => 'id_grupocreado']);
    }

    /**
     * Gets query for [[Tutor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTutor()
    {
        return $this->hasOne(User::class, ['id' => 'id_tutor']);
    }

    public static function getTutoresPerfil()
    {   //solo para mostrar datos del perfil de DOCENTES
       
       $sql="SELECT  user.id as id_docente, CONCAT( perfil.nombre,' ' ,perfil.apellido) as nombre FROM user, perfil, rol
          WHERE user.id=perfil.user_id and rol.id=user.rol_id and rol_nombre='Docente'";

       $db= Yii::$app->db;
       $docentes = $db->createCommand($sql)->queryAll();
        return ArrayHelper::map($docentes,  'id_docente',  'nombre');

    //return $this->hasOne(Perfil::className(), ['user_id' => 'iduser']);
    }





}
