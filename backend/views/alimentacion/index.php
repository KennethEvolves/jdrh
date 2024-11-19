<?php

use backend\models\Alimentacion;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Menu;

/** @var yii\web\View $this */
/** @var backend\models\search\AlimentacionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Alimentación';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alimentacion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Formulario Alimentación', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= Menu::widget([
        'items' => [
            ['label' => 'Lugar de alimentación', 'url' => ['lugar-alimentacion/index']],
            ['label' => 'Frecuencia de consumo', 'url' => ['frecuencia-consumo/index']],
            ['label' => 'Escala de consumo', 'url' => ['escala-consumo/index']],

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

            'id_alimentacion',
            'id_lugarAlimentacion',
            'id_frecuenciaConsumo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Alimentacion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_alimentacion' => $model->id_alimentacion]);
                 }
            ],
        ],
    ]); ?>


</div>
