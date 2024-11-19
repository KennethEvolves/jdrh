<?php

use backend\models\Salud;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\menu;

/** @var yii\web\View $this */
/** @var backend\models\search\SaludSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Formulario de Salud';
$this->params['breadcrumbs'][''] = $this->title;
?>
<div class="salud-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Salud', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Menu::widget([
        'items' => [
            ['label' => 'tipo sangre', 'url' => ['tipo-sangre/index']],
            ['label' => 'frecuencia dentista', 'url' => ['frecuencia-dentista/index']],
            ['label' => 'tratamiento psicologico', 'url' => ['tratamiento-psicologico/index']],
            ['label' => 'servicio salud', 'url' => ['servicio-salud/index']],
            ['label' => 'alergias', 'url' => ['alergias/index']],
            ['label' => 'tratamiento psiquiatrico', 'url' => ['tratamiento-psiquiatrico/index']],
            ['label' => 'problemas ultimo semestre', 'url' => ['problemas-ultimo-semestre/index']],
            ['label' => 'frecuencia medico', 'url' => ['frecuencia-medico/index']],
            ['label' => 'uso anteojos', 'url' => ['uso-anteojos/index']],
            ['label' => 'vacunas', 'url' => ['vacunas/index']],
            ['label' => 'afiliacion', 'url' => ['afiliacion/index']],
            ['label' => 'comite EN', 'url' => ['comiteen/index']],

            //['label' => 'Nombre de la sub tabla', 'url' => ['direccion de la subtabla separadas por guion ejemplo frecuencia-consumo/index']],

            // Añade más elementos de menú según necesites
        ],
        'options' => ['class' => 'nav nav-pills custom-menu', 'id' => 'menuNav'], // Custom classes
        'itemOptions' => ['class' => 'nav-item'],
        'linkTemplate' => '<a class="nav-link" href="{url}">{label}</a>',
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_salud',
            'tratamiento_medico',
            'tipo_sangre_id_tipoSangre',
            'id_frecuenciaDentista',
            'id_tratamientoPsicologico',
            //'id_servicioSalud',
            //'id_alergias',
            //'id_tratamientoPsiquiatrico',
            //'id_problemasUltimoSemestre',
            //'id_frecuenciaMedico',
            //'id_usoAnteojos',
            //'id_vacunas',
            //'id_afiliacionEscuela',
            //'id_comiteEN',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Salud $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_salud' => $model->id_salud]);
                 }
            ],
        ],
    ]); ?>


</div>
