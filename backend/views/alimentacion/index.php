<?php

use backend\models\Alimentacion;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\AlimentacionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Alimentacions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alimentacion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Alimentacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idcomida',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Alimentacion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idcomida' => $model->idcomida]);
                 }
            ],
        ],
    ]); ?>


</div>
