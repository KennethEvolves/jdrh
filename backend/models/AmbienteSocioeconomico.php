<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ambiente_socioeconomico".
 *
 * @property int $id_ambienteSocioeconomico
 * @property string $vivienda_padres ¿Vives en casa de tus padres?
 
 * @property int $id_servicios
 * @property int $id_usoPersonal
 * @property int $id_transporte
 * @property int $id_tiempo
 * @property int $id_vivienda
 * @property int $id_bienes
 *
 * @property Bienes $bienes
 * @property Servicios $servicios
 * @property Tiempo $tiempo
 * @property Transporte $transporte
 * @property UsoPersonal $usoPersonal
 * @property Vivienda $vivienda
 */
class AmbienteSocioeconomico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ambiente_socioeconomico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vivienda_padres', 'id_servicios', 'id_usoPersonal', 'id_transporte', 'id_tiempo', 'id_vivienda', 'id_bienes'], 'required', 'message'=> 'Este campo no puede estar vacio'],
            [['vivienda_padres'], 'string'],
            [['id_servicios', 'id_usoPersonal', 'id_transporte', 'id_tiempo', 'id_vivienda', 'id_bienes'], 'integer'],
            [['id_bienes'], 'exist', 'skipOnError' => true, 'targetClass' => Bienes::class, 'targetAttribute' => ['id_bienes' => 'id_bienes']],
            [['id_servicios'], 'exist', 'skipOnError' => true, 'targetClass' => Servicios::class, 'targetAttribute' => ['id_servicios' => 'id_servicios']],
            [['id_tiempo'], 'exist', 'skipOnError' => true, 'targetClass' => Tiempo::class, 'targetAttribute' => ['id_tiempo' => 'id_tiempo']],
            [['id_transporte'], 'exist', 'skipOnError' => true, 'targetClass' => Transporte::class, 'targetAttribute' => ['id_transporte' => 'id_transporte']],
            [['id_usoPersonal'], 'exist', 'skipOnError' => true, 'targetClass' => UsoPersonal::class, 'targetAttribute' => ['id_usoPersonal' => 'id_usoPersonal']],
            [['id_vivienda'], 'exist', 'skipOnError' => true, 'targetClass' => Vivienda::class, 'targetAttribute' => ['id_vivienda' => 'id_vivienda']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ambienteSocioeconomico' => 'Id Ambiente Socioeconomico',
            'vivienda_padres' => 'Vivienda Padres',
            'id_servicios' => 'Id Servicios',
            'id_usoPersonal' => 'Id Uso Personal',
            'id_transporte' => 'Id Transporte',
            'id_tiempo' => 'Id Tiempo',
            'id_vivienda' => 'Id Vivienda',
            'id_bienes' => 'Id Bienes',
        ];
    }

    /**
     * Gets query for [[Bienes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBienes()
    {
        return $this->hasOne(Bienes::class, ['id_bienes' => 'id_bienes']);
    }

    /**
     * Gets query for [[Servicios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServicios()
    {
        return $this->hasOne(Servicios::class, ['id_servicios' => 'id_servicios']);
    }

    /**
     * Gets query for [[Tiempo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTiempo()
    {
        return $this->hasOne(Tiempo::class, ['id_tiempo' => 'id_tiempo']);
    }

    /**
     * Gets query for [[Transporte]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransporte()
    {
        return $this->hasOne(Transporte::class, ['id_transporte' => 'id_transporte']);
    }

    /**
     * Gets query for [[UsoPersonal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsoPersonal()
    {
        return $this->hasOne(UsoPersonal::class, ['id_usoPersonal' => 'id_usoPersonal']);
    }

    /**
     * Gets query for [[Vivienda]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVivienda()
    {
        return $this->hasOne(Vivienda::class, ['id_vivienda' => 'id_vivienda']);
    }
}
