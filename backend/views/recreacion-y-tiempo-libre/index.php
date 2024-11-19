<?php

use backend\models\RecreacionYTiempoLibre;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Menu;

/** @var yii\web\View $this */
/** @var backend\models\search\RecreacionYTiempoLibreSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Recreacion Y Tiempo Libre';
$this->params['breadcrumbs'][''] = $this->title;
?>
<div class="recreacion-ytiempo-libre-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Recreacion Y Tiempo Libre', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Menu::widget([
        'items' => [
            ['label' => 'Lugar Acceso', 'url' => ['lugar-acceso/index']],
            ['label' => 'Organización', 'url' => ['organizacion/index']],
            ['label' => 'Intereses personales', 'url' => ['intereses-personales/index']],

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

            'id_recreacionTiempoLibre',
            'uso_internet',
            'acceso_internet',
            'cuestionamiento_usoInternet',
            'areasInteres:ntext',
            //'id_lugarAcceso',
            //'id_participacionOrganizacion',
            //'id_interesesPersonales',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RecreacionYTiempoLibre $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_recreacionTiempoLibre' => $model->id_recreacionTiempoLibre]);
                 }
            ],
        ],
    ]); ?>


</div>
