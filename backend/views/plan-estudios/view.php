<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\UnidadEstudio;
use backend\models\search\UnidadEstudioSearch;
use backend\models\PlanEstudios;

/** @var yii\web\View $this */
/** @var backend\models\PlanEstudios $model */

$this->title = $model->id_plan;
$this->params['breadcrumbs'][] = ['label' => 'Plan Estudios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="plan-estudios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_plan' => $model->id_plan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_plan' => $model->id_plan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            [
                'attribute' => 'id_plan',
                'label' => 'Plan ' // Cambia el nombre de la columna clave
            ],
            'nombre',
            // 'fecha_autorizacion',
            [
                'attribute' => 'fecha_autorizacion',
                'label' => 'Fecha De Autorización ' // Cambia el nombre de la columna clave
            ],
            'vigencia',
            'estado',
            'observaciones:ntext',
            
            [
                'attribute' => 'carrera_id_carrera',
                'label' => 'Carrera ' // Cambia el nombre de la columna clave
            ],
            
        ],
    ]) ?>


<p>
        <?= Html::a('Create Unidad Estudio', ['unidad-estudio/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            // [
            //     'attribute' => 'id_unidad',
            //     'label' => 'Unidad ' // Cambia el nombre de la columna clave
            // ],
            
            'nombre_asignatura',
            // 'plan_estudios_id_plan',

            ['attribute'=>'plan_estudios_id_plan',
                            'value'=>function($model)
                        {   $PlanEstudios = PlanEstudios::findOne($model->plan_estudios_id_plan);
                            return $PlanEstudios->nombre;
                        },
                'filter'=>ArrayHelper::map(PlanEstudios::find()->all(), 'id_plan','nombre'),
                'label' => 'Nombre Del Plan' // Cambia el nombre de la columna clave
            ],


            'clave',
            
            'creditos_asignatura',
            'des_general:ntext',
            //'ras_perfil:ntext',
            //'sabe_profesionales:ntext',
            //'elem_universo:ntext',
            //'num_momentos',
            //'satca',
            //'semestre',
            
            //'fases_id_fase',


            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, UnidadEstudio $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id_unidad' => $model->id_unidad]);
            //      }
            // ],
        ],
    ]); ?>


</div>
