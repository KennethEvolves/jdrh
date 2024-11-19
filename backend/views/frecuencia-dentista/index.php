<?php

use backend\models\FrecuenciaDentista;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\FrecuenciaDentistaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Frecuencia Dentista';
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frecuencia-dentista-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Frecuencia Dentista', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_frecuenciaDentista',
            'frecuencia',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, FrecuenciaDentista $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_frecuenciaDentista' => $model->id_frecuenciaDentista]);
                 }
            ],
        ],
    ]); ?>


</div>
