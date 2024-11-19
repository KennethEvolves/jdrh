<?php

use backend\models\Bienes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\BienesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Bienes';
$this->params['breadcrumbs'][] = ['label' => 'Ambiente Socioeconomico', 'url' => ['ambiente-socioeconomico/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bienes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Formulario de Bienes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_bienes',
            'tipos_bienes',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Bienes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_bienes' => $model->id_bienes]);
                 }
            ],
        ],
    ]); ?>


</div>
