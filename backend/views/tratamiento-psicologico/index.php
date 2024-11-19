<?php

use backend\models\TratamientoPsicologico;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\TratamientoPsicologicoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tratamiento Psicologico';
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tratamiento-psicologico-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tratamiento Psicologico', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tratamientoPsicologico',
            'tipo_psicologo',
            'tipo_tiempo',
            'tipo_lugar',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TratamientoPsicologico $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_tratamientoPsicologico' => $model->id_tratamientoPsicologico]);
                 }
            ],
        ],
    ]); ?>


</div>
