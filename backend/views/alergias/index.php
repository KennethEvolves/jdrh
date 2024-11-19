<?php

use backend\models\Alergias;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\AlergiasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Alergias';
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alergias-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alergias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_alergias',
            'tipo_alergias',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Alergias $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_alergias' => $model->id_alergias]);
                 }
            ],
        ],
    ]); ?>


</div>
