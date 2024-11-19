<?php

use backend\models\ServicioSalud;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\ServicioSaludSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Servicio Salud';
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicio-salud-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Servicio Salud', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_servicioSalud',
            'tipo_servicio',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ServicioSalud $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_servicioSalud' => $model->id_servicioSalud]);
                 }
            ],
        ],
    ]); ?>


</div>
