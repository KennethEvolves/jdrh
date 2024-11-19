<?php

use backend\models\Vacunas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\VacunasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Vacunas';
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacunas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Vacunas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_vacunas',
            'tipo_vacunas',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Vacunas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_vacunas' => $model->id_vacunas]);
                 }
            ],
        ],
    ]); ?>


</div>
