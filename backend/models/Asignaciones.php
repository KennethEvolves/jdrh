<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\user;


/**
 * This is the model class for table "asignaciones".
 *
 * @property int $grupo_id_grupo
 * @property int $periodo_semestral_id_ciclo
 * @property int $unidad_estudio_id_unidad
 * @property int $usuario_idusuario
 *
 * @property Grupo $grupoIdGrupo
 * @property PeriodoSemestral $periodoSemestralIdCiclo
 * @property UnidadEstudio $unidadEstudioIdUnidad
 * @property User $usuarioIdusuario
 */
class Asignaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asignaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['grupo_id_grupo', 'periodo_semestral_id_ciclo', 'unidad_estudio_id_unidad', 'usuario_idusuario'], 'required'],
            [['grupo_id_grupo', 'periodo_semestral_id_ciclo', 'unidad_estudio_id_unidad', 'usuario_idusuario'], 'integer'],
            [['grupo_id_grupo', 'periodo_semestral_id_ciclo', 'unidad_estudio_id_unidad'], 'unique', 'targetAttribute' => ['grupo_id_grupo', 'periodo_semestral_id_ciclo', 'unidad_estudio_id_unidad']],
            [['usuario_idusuario'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['usuario_idusuario' => 'id']],
            [['grupo_id_grupo'], 'exist', 'skipOnError' => true, 'targetClass' => Grupo::class, 'targetAttribute' => ['grupo_id_grupo' => 'id_grupo']],
            [['periodo_semestral_id_ciclo'], 'exist', 'skipOnError' => true, 'targetClass' => PeriodoSemestral::class, 'targetAttribute' => ['periodo_semestral_id_ciclo' => 'id_ciclo']],
            [['unidad_estudio_id_unidad'], 'exist', 'skipOnError' => true, 'targetClass' => UnidadEstudio::class, 'targetAttribute' => ['unidad_estudio_id_unidad' => 'id_unidad']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'grupo_id_grupo' => 'Grupo Id Grupo',
            'periodo_semestral_id_ciclo' => 'Periodo Semestral Id Ciclo',
            'unidad_estudio_id_unidad' => 'Unidad Estudio Id Unidad',
            'usuario_idusuario' => 'Usuario Idusuario',
        ];
    }

    /**
     * Gets query for [[GrupoIdGrupo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoIdGrupo()
    {
        return $this->hasOne(Grupo::class, ['id_grupo' => 'grupo_id_grupo']);
    }

    /**
     * Gets query for [[PeriodoSemestralIdCiclo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodoSemestralIdCiclo()
    {
        return $this->hasOne(PeriodoSemestral::class, ['id_ciclo' => 'periodo_semestral_id_ciclo']);
    }

    /**
     * Gets query for [[UnidadEstudioIdUnidad]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnidadEstudioIdUnidad()
    {
        return $this->hasOne(UnidadEstudio::class, ['id_unidad' => 'unidad_estudio_id_unidad']);
    }

    /**
     * Gets query for [[UsuarioIdusuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioIdusuario()
    {
        return $this->hasOne(User::class, ['id' => 'usuario_idusuario']);
    }

    public static function getDocentesPerfil()
    {   //solo para mostrar datos del perfil de DOCENTES
       
       $sql="SELECT  user.id as id_docente, CONCAT( perfil.nombre,' ' ,perfil.apellido) as nombre FROM user, perfil, rol
          WHERE user.id=perfil.user_id and rol.id=user.rol_id and rol_nombre='Docente'";

       $db= Yii::$app->db;
       $docentes = $db->createCommand($sql)->queryAll();
        return ArrayHelper::map($docentes,  'id_docente',  'nombre');

    //return $this->hasOne(Perfil::className(), ['user_id' => 'iduser']);
    }
}



