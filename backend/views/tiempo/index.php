<?php

use backend\models\Tiempo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\TiempoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tiempos';
$this->params['breadcrumbs'][] = ['label' => 'Ambiente Socioeconomico', 'url' => ['ambiente-socioeconomico/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tiempo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Formulario de tiempos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tiempo',
            'tiempo_llegada',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Tiempo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_tiempo' => $model->id_tiempo]);
                 }
            ],
        ],
    ]); ?>


</div>
