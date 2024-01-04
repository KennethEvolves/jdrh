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

            'id_plan',
            'nombre',
            'fecha_autorizacion',
            'vigencia',
            'estado',
            //'observaciones:ntext',
            //'carrera_id_carrera',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PlanEstudios $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_plan' => $model->id_plan]);
                 }
            ],
        ],
    ]); ?>


</div>
