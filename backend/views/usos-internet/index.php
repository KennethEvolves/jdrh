<?php

use backend\models\UsosInternet;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\UsosInternetSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Usos Internets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usos-internet-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Usos Internet', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idusos_internet',
            'descripcion',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, UsosInternet $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idusos_internet' => $model->idusos_internet]);
                 }
            ],
        ],
    ]); ?>


</div>
