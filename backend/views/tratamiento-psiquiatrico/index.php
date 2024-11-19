<?php

use backend\models\TratamientoPsiquiatrico;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\TratamientoPsiquiatricoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tratamiento Psiquiatrico';
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tratamiento-psiquiatrico-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tratamiento Psiquiatrico', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tratamientoPsiquiatrico',
            'tipo_psiquiatra',
            'tipo_tiempo',
            'tipo_lugar',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TratamientoPsiquiatrico $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_tratamientoPsiquiatrico' => $model->id_tratamientoPsiquiatrico]);
                 }
            ],
        ],
    ]); ?>


</div>
