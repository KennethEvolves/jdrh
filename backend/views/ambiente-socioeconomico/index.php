<?php

use backend\models\AmbienteSocioeconomico;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Menu;

/** @var yii\web\View $this */
/** @var backend\models\search\AmbienteSocioeconomicoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ambiente Socioeconomicos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ambiente-socioeconomico-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear formulario de ambiente socioeconomico', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Menu::widget([
        'items' => [
            ['label' => 'servicios', 'url' => ['servicios/index']],
            ['label' => 'uso personal', 'url' => ['uso-personal/index']],
            ['label' => 'transporte', 'url' => ['transporte/index']],
            ['label' => 'tiempo', 'url' => ['tiempo/index']],
            ['label' => 'vivienda', 'url' => ['vivienda/index']],
            ['label' => 'bienes', 'url' => ['bienes/index']],


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

            'id_ambienteSocioeconomico',
            'vivienda_padres',
            'id_servicios',
            'id_usoPersonal',
            'id_transporte',
            //'id_tiempo',
            //'id_vivienda',
            //'id_bienes',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AmbienteSocioeconomico $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_ambienteSocioeconomico' => $model->id_ambienteSocioeconomico]);
                 }
            ],
        ],
    ]); ?>


</div>
