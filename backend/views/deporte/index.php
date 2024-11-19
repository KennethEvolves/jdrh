<?php

use backend\models\Deporte;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\DeporteSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Deporte';
$this->params['breadcrumbs'][] = ['label' => 'Ejercicio Y Deporte', 'url' => ['ejercicio-y-deporte/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deporte-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Deporte', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_deporte',
            'tipo_deporte',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Deporte $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_deporte' => $model->id_deporte]);
                 }
            ],
        ],
    ]); ?>


</div>
