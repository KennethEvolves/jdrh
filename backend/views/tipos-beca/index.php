<?php

use backend\models\Tiposbeca;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\TiposBecaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tiposbecas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tiposbeca-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tiposbeca', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idtipos_beca',
            'nombre',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Tiposbeca $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idtipos_beca' => $model->idtipos_beca]);
                 }
            ],
        ],
    ]); ?>


</div>
