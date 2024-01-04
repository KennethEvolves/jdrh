<?php

use backend\models\PeriodoSemestral;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\PeriodoSemestralSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Periodo Semestral';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodo-semestral-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Periodo Semestral', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_ciclo',
            'fecha_inicio',
            'fecha_fin',
            'periodo',
            'semanas',
            //'estado',
            //'descripcion:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PeriodoSemestral $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_ciclo' => $model->id_ciclo]);
                 }
            ],
        ],
    ]); ?>


</div>
