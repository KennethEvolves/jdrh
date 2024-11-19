<?php

use backend\models\DatosGenerales;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\DatosGeneralesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Datos Generales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datos-generales-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Datos Generales', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'iddatos_generales',
            'licenciatura:ntext',
            'generacion',
            'id_expediente',
            'capacitacion_previa',
            //'talleres_interes',
            //'tiempo_formacionIntegral',
            //'aspectos_sobresalientesEscuela',
            //'areas_oportunidadEscuela',
            //'preparatoria',
            //'estudios_adicionales',
            //'primera_opcion_licenciatura',
            //'cursas_eleccionLicenciatura',
            //'posible_licenciaturaGusto',
            //'proyectoVida_cincoAños',
            //'proyectoVida_diezAños',
            //'actividad_extracurricular',
            //'observaciones_sugerencias',
            //'tiempo_estudio',
            //'id_motivosEstudioLicenciatura',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, DatosGenerales $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'iddatos_generales' => $model->iddatos_generales]);
                 }
            ],
        ],
    ]); ?>


</div>
