<?php

use backend\models\Vivienda;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\ViviendaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tipos de vivienda';
$this->params['breadcrumbs'][] = ['label' => 'Ambiente Socioeconomico', 'url' => ['ambiente-socioeconomico/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vivienda-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Formulario tipos de vivienda', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_vivienda',
            'tipo_vivienda',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Vivienda $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_vivienda' => $model->id_vivienda]);
                 }
            ],
        ],
    ]); ?>


</div>
