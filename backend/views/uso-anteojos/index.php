<?php

use backend\models\UsoAnteojos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\UsoAnteojosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Uso Anteojos';
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uso-anteojos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Uso Anteojos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_usoAnteojos',
            'uso',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, UsoAnteojos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_usoAnteojos' => $model->id_usoAnteojos]);
                 }
            ],
        ],
    ]); ?>


</div>
