<?php

use backend\models\Asignaciones;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\user;


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

            // 'grupo_id_grupo',
            [
                'attribute' => 'grupo_id_grupo',
                'label' => 'Grupo  ' // Cambia el nombre de la columna clave
            ],

           
            // 'periodo_semestral_id_ciclo',
            [
                'attribute' => 'periodo_semestral_id_ciclo',
                'label' => 'Periodo  ' // Cambia el nombre de la columna clave
            ],

            // 'unidad_estudio_id_unidad',
            [
                'attribute' => 'unidad_estudio_id_unidad',
                'label' => 'Unidad  ' // Cambia el nombre de la columna clave
            ],

            // 'usuario_idusuario',
            [
                'attribute' => 'usuario_idusuario',
                'label' => 'Nombre Del Docente  ' // Cambia el nombre de la columna clave
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Asignaciones $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'grupo_id_grupo' => $model->grupo_id_grupo, 'periodo_semestral_id_ciclo' => $model->periodo_semestral_id_ciclo, 'unidad_estudio_id_unidad' => $model->unidad_estudio_id_unidad]);
                 }
            ],
        ],
    ]); ?>


</div>
