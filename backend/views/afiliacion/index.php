<?php

use backend\models\Afiliacion;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\AfiliacionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Afiliación';
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="afiliacion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Afiliacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_afiliacionEscuela',
            'tipo_afiliacion',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Afiliacion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_afiliacionEscuela' => $model->id_afiliacionEscuela]);
                 }
            ],
        ],
    ]); ?>


</div>
