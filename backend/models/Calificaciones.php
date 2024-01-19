<?php

namespace backend\models;

use yii\helpers\ArrayHelper;
use common\models\User;
use frontend\models\Perfil;
use Yii;
use backend\models\Generaciones;

/**
 * This is the model class for table "calificaciones".
 *
 * @property int $id_calificacion
 * @property int $id_docente
 * @property int $id_unidad_estudio
 * @property int $id_grado
 * @property int $id_grupo
 * @property int $id_periodo_semestral
 * @property int $id_alumno
 * @property float $calif_m1
 * @property float $calif_m2
 * @property float $promedio
 * @property float $proyecto_integrador
 * @property float $calif_final
 * @property int $porcentaje_asistencia
 * @property int $id_generaciones
 *
 * @property User $alumno
 * @property User $docente
 * @property Grado $grado
 * @property Grupo $grupo
 * @property PeriodoSemestral $periodoSemestral
 * @property UnidadEstudio $unidadEstudio
 */
class Calificaciones extends \yii\db\ActiveRecord
{
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calificaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_docente', 'id_unidad_estudio', 'id_grado', 'id_grupo', 'id_periodo_semestral', 'id_alumno','id_generaciones'], 'required'],
            [['id_docente', 'id_unidad_estudio', 'id_grado', 'id_grupo', 'id_periodo_semestral', 'id_alumno', 'porcentaje_asistencia'], 'integer'],

            [['calif_m1', 'calif_m2', 'promedio', 'proyecto_integrador', 'calif_final'], 'number', 'max' => 100],
            //si quieres que tenga decimales[['calif_m2'], 'number', 'min' => 1, 'max' => 10, 'numberPattern' => '/^\d{1,3}(\.\d{0,1})?$/'],            
            [['id_docente'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_docente' => 'id']],
            [['id_unidad_estudio'], 'exist', 'skipOnError' => true, 'targetClass' => UnidadEstudio::class, 'targetAttribute' => ['id_unidad_estudio' => 'id_unidad']],
            [['id_grado'], 'exist', 'skipOnError' => true, 'targetClass' => Grado::class, 'targetAttribute' => ['id_grado' => 'id_grado']],
            [['id_grupo'], 'exist', 'skipOnError' => true, 'targetClass' => Grupo::class, 'targetAttribute' => ['id_grupo' => 'id_grupo']],
            [['id_periodo_semestral'], 'exist', 'skipOnError' => true, 'targetClass' => PeriodoSemestral::class, 'targetAttribute' => ['id_periodo_semestral' => 'id_ciclo']],
            [['id_alumno'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_alumno' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_calificacion' => 'Id Calificacion',
            'id_docente' => 'Id Docente',
            'id_unidad_estudio' => 'Id Unidad Estudio',
            'id_grado' => 'Id Grado',
            'id_grupo' => 'Id Grupo',
            'id_periodo_semestral' => 'Id Periodo Semestral',
            'id_alumno' => 'Id Alumno',
            'calif_m1' => 'Calif M1',
            'calif_m2' => 'Calif M2',
            'promedio' => 'Promedio',
            'proyecto_integrador' => 'Proyecto Integrador',
            'calif_final' => 'Calif Final',
            'porcentaje_asistencia' => 'Porcentaje Asistencia',
            'id_generaciones' => 'Generacion'
        ];
    }

    /**
     * Gets query for [[Alumno]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlumno()
    {
        return $this->hasOne(User::class, ['id' => 'id_alumno'])->with('perfil');
    }

    /**
     * Gets query for [[Docente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocente()
    {
        
        return $this->hasOne(User::class, ['id' => 'id_docente']) ->with('perfil');
    }


    /**
     * Gets query for [[Grado]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrado()
    {
        return $this->hasOne(Grado::class, ['id_grado' => 'id_grado']);
    }

    /**
     * Gets query for [[Grupo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrupo()
    {
        return $this->hasOne(Grupo::class, ['id_grupo' => 'id_grupo']);
    }

    /**
     * Gets query for [[PeriodoSemestral]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodoSemestral()
    {
        return $this->hasOne(PeriodoSemestral::class, ['id_ciclo' => 'id_periodo_semestral']);
    }

    /**
     * Gets query for [[UnidadEstudio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnidadEstudio()
    {
        return $this->hasOne(UnidadEstudio::class, ['id_unidad' => 'id_unidad_estudio']);
    }

    public function getGeneraciones()
    {
        return $this->hasOne(Generaciones::class, ['id_generacion' => 'id_generaciones']);
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

    public static function getAlumnoPerfil()
    {
        $sql = "SELECT user.id as id_alumno, CONCAT(perfil.nombre, ' ', perfil.apellido) as nombre 
                FROM user, perfil, rol
                WHERE user.id = perfil.user_id 
                AND rol.id = user.rol_id 
                AND rol_nombre = 'Alumno'
                AND user.id NOT IN (
                    SELECT id_alumno FROM calificaciones
                    WHERE id_alumno IS NOT NULL
                )";

        $db = Yii::$app->db;
        $alumnos = $db->createCommand($sql)->queryAll();

        return ArrayHelper::map($alumnos, 'id_alumno', 'nombre');
    }

    
    


    // public static function getAlumnoPerfil()
    // {   //solo para mostrar datos del perfil de alumnos
       
    //    $sql="SELECT  user.id as id_alumno, CONCAT( perfil.nombre,' ' ,perfil.apellido) as nombre FROM user, perfil, rol
    //       WHERE user.id=perfil.user_id and rol.id=user.rol_id and rol_nombre='Alumno'";

    //    $db= Yii::$app->db;
    //    $alumnos = $db->createCommand($sql)->queryAll();
    //     return ArrayHelper::map($alumnos,  'id_alumno',  'nombre');

    // //return $this->hasOne(Perfil::className(), ['user_id' => 'iduser']);
    // }

    
}
