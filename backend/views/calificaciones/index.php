<?php

use backend\models\Calificaciones;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\CalificacionesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Calificaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calificaciones-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Calificaciones', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_calificaciones',
            'nombre:ntext',
            'asistencia',
            'total',
            'rasgos_evaluar',
            //'usuario_alumno',
            //'usuario_docente',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Calificaciones $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_calificaciones' => $model->id_calificaciones]);
                 }
            ],
        ],
    ]); ?>


</div>
