<?php

use backend\models\Habitos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Menu;

/** @var yii\web\View $this */
/** @var backend\models\search\HabitosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Habitos';
$this->params['breadcrumbs'][''] = $this->title;
?>
<div class="habitos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Habitos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Menu::widget([
        'items' => [
            ['label' => 'Adicciones', 'url' => ['adicciones/index']],
            //['label' => 'Deporte', 'url' => ['deporte/index']],
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

            'id_habitos',
            'habito_fumar',
            'num_cigarros',
            'habito_alcohol',
            'veces_semana',
            //'id_adicciones',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Habitos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_habitos' => $model->id_habitos]);
                 }
            ],
        ],
    ]); ?>


</div>
