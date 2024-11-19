<?php

use backend\models\ProblemasUltimoSemestre;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\ProblemasUltimoSemestreSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Problemas Ultimo Semestre';
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="problemas-ultimo-semestre-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Problemas Ultimo Semestre', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_problemasUltimoSemestre',
            'tiene_problema',
            'tipo_problema',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProblemasUltimoSemestre $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_problemasUltimoSemestre' => $model->id_problemasUltimoSemestre]);
                 }
            ],
        ],
    ]); ?>


</div>
