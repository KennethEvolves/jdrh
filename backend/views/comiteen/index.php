<?php

use backend\models\Comiteen;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\ComiteenSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Comiteens';
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comiteen-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Comiteen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_comiteEN',
            'tipo_comiteEN',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Comiteen $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_comiteEN' => $model->id_comiteEN]);
                 }
            ],
        ],
    ]); ?>


</div>
