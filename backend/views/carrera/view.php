<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\search\PlanEstudiosSearch;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;
use backend\models\PlanEstudios;
use backend\models\carrera;




/** @var yii\web\View $this */
/** @var backend\models\Carrera $model */

$this->title = $model->id_carrera;
$this->params['breadcrumbs'][] = ['label' => 'Carreras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="carrera-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_carrera' => $model->id_carrera], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_carrera' => $model->id_carrera], [
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
            'id_carrera',
            'nombre',
            'clave',
            'creditos',
            'cred_serv_social',
            'descripcion:ntext',
            'carreracol',
        ],
    ]) ?>

    
    <p>
    <?= Html::a('Create Plan Estudios', ['plan-estudios/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_plan',
            'nombre',

            // ['attribute'=>'id_carrera',
            //     'value'=>function($model)  
            //             {   $carrera = carrera::findOne($model->id_carrera);
            //                 return $carrera->nombre;
            //             },
            //     'filter'=>ArrayHelper::map(carrera::find()->all(), 'id_carrera','nombre'),
            // ],
            
            'carrera_id_carrera',
            'fecha_autorizacion',
            'vigencia',
            'estado',
            //'observaciones:ntext',


        ['class' => 'yii\grid\ActionColumn','controller' => 'plan-estudios','template' => '{view} {update} {delete}'],


            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, PlanEstudios $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id_plan' => $model->id_plan]);
            //      }
            // ],


        ],
    ]); ?>
    


</div>
