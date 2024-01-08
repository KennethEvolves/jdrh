<?php

use backend\models\UnidadEstudio;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\UnidadEstudioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Unidad Estudios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidad-estudio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Unidad Estudio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            [
                'attribute' => 'id_unidad',
                'label' => 'Unidad ' // Cambia el nombre de la columna clave
            ],
            
            'clave',
            'nombre_asignatura',
            'creditos_asignatura',
            'des_general:ntext',
            //'ras_perfil:ntext',
            //'sabe_profesionales:ntext',
            //'elem_universo:ntext',
            //'num_momentos',
            //'satca',
            //'semestre',
            //'plan_estudios_id_plan',
            //'fases_id_fase',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, UnidadEstudio $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_unidad' => $model->id_unidad]);
                 }
            ],
        ],
    ]); ?>


</div>
