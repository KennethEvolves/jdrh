<?php

use backend\models\TipoDependencia;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\TipoDependenciaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tipo Dependencias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-dependencia-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tipo Dependencia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idtipo_dependencia',
            'tipo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TipoDependencia $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idtipo_dependencia' => $model->idtipo_dependencia]);
                 }
            ],
        ],
    ]); ?>


</div>
