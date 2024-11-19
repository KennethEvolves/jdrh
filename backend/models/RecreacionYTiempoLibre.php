<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "recreacion_y_tiempo_libre".
 *
 * @property int $id_recreacionTiempoLibre
 * @property string $uso_internet
 * @property string $acceso_internet
 * @property string $cuestionamiento_usoInternet
 * @property string $areasInteres
 * @property int $id_lugarAcceso
 * @property int $id_participacionOrganizacion
 * @property int $id_interesesPersonales
 */
class RecreacionYTiempoLibre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recreacion_y_tiempo_libre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uso_internet', 'acceso_internet', 'cuestionamiento_usoInternet', 'areasInteres', 'id_lugarAcceso', 'id_participacionOrganizacion', 'id_interesesPersonales'], 'required'],
            [['areasInteres'], 'string'],
            [['id_lugarAcceso', 'id_participacionOrganizacion', 'id_interesesPersonales'], 'integer'],
            [['uso_internet', 'acceso_internet', 'cuestionamiento_usoInternet'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_recreacionTiempoLibre' => 'Id Recreacion Tiempo Libre',
            'uso_internet' => 'Uso Internet',
            'acceso_internet' => 'Acceso Internet',
            'cuestionamiento_usoInternet' => 'Cuestionamiento Uso Internet',
            'areasInteres' => 'Areas Interes',
            'id_lugarAcceso' => 'Id Lugar Acceso',
            'id_participacionOrganizacion' => 'Id Participacion Organizacion',
            'id_interesesPersonales' => 'Id Intereses Personales',
        ];
    }
}
