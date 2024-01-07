<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

use common\models\User;

/**
 * This is the model class for table "calificaciones".
 *
 * @property int $id_calificaciones
 * @property string|null $nombre
 * @property int|null $asistencia
 * @property float|null $total
 * @property string|null $rasgos_evaluar
 * @property int $usuario_alumno
 * @property int $usuario_docente
 *
 * @property User $usuarioAlumno
 * @property User $usuarioDocente
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
            [['nombre'], 'string'],
            [['asistencia', 'usuario_alumno', 'usuario_docente'], 'integer'],
            [['total'], 'number'],
            [['usuario_alumno', 'usuario_docente'], 'required'],
            [['rasgos_evaluar'], 'string', 'max' => 50],
            [['usuario_alumno'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['usuario_alumno' => 'id']],
            [['usuario_docente'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['usuario_docente' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_calificaciones' => 'Id Calificaciones',
            'nombre' => 'Nombre',
            'asistencia' => 'Asistencia',
            'total' => 'Total',
            'rasgos_evaluar' => 'Rasgos Evaluar',
            'usuario_alumno' => 'Usuario Alumno',
            'usuario_docente' => 'Usuario Docente',
        ];
    }

    /**
     * Gets query for [[UsuarioAlumno]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioAlumno()
    {
        return $this->hasOne(User::class, ['id' => 'usuario_alumno']);
    }

    /**
     * Gets query for [[UsuarioDocente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioDocente()
    {
        return $this->hasOne(User::class, ['id' => 'usuario_docente']);
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

    public static function getAlumnosPerfil()
    {   //solo para mostrar datos del perfil de ALUMNOS
       
       $sql="SELECT  user.id as id_docente, CONCAT( perfil.nombre,' ' ,perfil.apellido) as nombre FROM user, perfil, rol
          WHERE user.id=perfil.user_id and rol.id=user.rol_id and rol_nombre='Alumno'";

       $db= Yii::$app->db;
       $docentes = $db->createCommand($sql)->queryAll();
        return ArrayHelper::map($docentes,  'id_docente',  'nombre');

    //return $this->hasOne(Perfil::className(), ['user_id' => 'iduser']);
    }    

}
