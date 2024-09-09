<?php

use backend\models\PlanEstudios;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\PlanEstudiosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Plan Estudios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-estudios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Plan Estudios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            [
                'attribute' => 'id_plan',
                'label' => 'Plan ' // Cambia el nombre de la columna clave
            ],
            'nombre',
            [
                'attribute' => 'carrera_id_carrera',
                'label' => 'Carrera ' // Cambia el nombre de la columna clave
            ],
            [
                'attribute' => 'fecha_autorizacion',
                'label' => 'Fecha De Autorización ' // Cambia el nombre de la columna clave
            ],
            'vigencia',
            'estado',
            //'observaciones:ntext',
            
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PlanEstudios $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_plan' => $model->id_plan]);
                 }
            ],
        ],
    ]); ?>


</div>
