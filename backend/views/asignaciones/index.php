<?php

use backend\models\Asignaciones;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\AsignacionesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Asignaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignaciones-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Asignaciones', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'grupo_id_grupo',
            'periodo_semestral_id_ciclo',
            'unidad_estudio_id_unidad',
            'usuario_idusuario',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Asignaciones $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'grupo_id_grupo' => $model->grupo_id_grupo, 'periodo_semestral_id_ciclo' => $model->periodo_semestral_id_ciclo, 'unidad_estudio_id_unidad' => $model->unidad_estudio_id_unidad]);
                 }
            ],
        ],
    ]); ?>


</div>
