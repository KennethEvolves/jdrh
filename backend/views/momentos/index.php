<?php

use backend\models\Momentos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\MomentosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Momentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="momentos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Momentos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_momento',
            'nombre',
            'subtemas:ntext',
            'act_aprendizaje:ntext',
            'act_ensenanza:ntext',
            //'sugerencia_evaluacion:ntext',
            //'fuentes_aprendizaje:ntext',
            //'unidad_estudio_id_unidad',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Momentos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_momento' => $model->id_momento]);
                 }
            ],
        ],
    ]); ?>


</div>
