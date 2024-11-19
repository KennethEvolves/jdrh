<?php

use backend\models\EjercicioYDeporte;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Menu; //COPIAR O IMPORTAR

/** @var yii\web\View $this */
/** @var backend\models\search\EjercicioYDeporteSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ejercicio Y Deporte';
$this->params['breadcrumbs'][''] = $this->title;
?>
<div class="ejercicio-ydeporte-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Ejercicio Y Deporte', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php // Copiar para el SUBMENU de tu tabla principal ejemplo EjercicioYDeporte > Deporte?>
    <?= Menu::widget([
        'items' => [
            ['label' => 'Actividad', 'url' => ['actividad/index']],
            ['label' => 'Deporte', 'url' => ['deporte/index']],
            //['label' => 'Nombre de la sub tabla', 'url' => ['direccion de la subtabla separadas por guion ejemplo frecuencia-consumo/index']],

            // Añade más elementos de menú según necesites
        ],
        'options' => ['class' => 'nav nav-pills custom-menu', 'id' => 'menuNav'], // Custom classes
        'itemOptions' => ['class' => 'nav-item'],
        'linkTemplate' => '<a class="nav-link" href="{url}">{label}</a>',
    ]) ?>

    <?php // Hasta aqui se termina de copiar el submenu?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_ejercicioDeporte',
            'veces_ejercicio',
            'id_actividad',
            'id_deporte',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, EjercicioYDeporte $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_ejercicioDeporte' => $model->id_ejercicioDeporte]);
                 }
            ],
        ],
    ]); ?>


</div>
