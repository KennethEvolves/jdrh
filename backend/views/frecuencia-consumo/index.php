<?php

use backend\models\FrecuenciaConsumo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\FrecuenciaConsumoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Frecuencia Consumos';
$this->params['breadcrumbs'][] = ['label' => 'Alimentacion', 'url' => ['alimentacion/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frecuencia-consumo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Formulario frecuencia de consumo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_frecuenciaConsumo',
            'tipo_alimento',
            'id_escala',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, FrecuenciaConsumo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_frecuenciaConsumo' => $model->id_frecuenciaConsumo]);
                 }
            ],
        ],
    ]); ?>


</div>
