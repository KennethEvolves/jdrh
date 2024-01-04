<?php

use backend\models\Fases;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\FasesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Fases';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fases-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Fases', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_fase',
            'nombre',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Fases $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_fase' => $model->id_fase]);
                 }
            ],
        ],
    ]); ?>


</div>
