<?php

use backend\models\TipoDependientes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\TipoDependientesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tipo Dependientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-dependientes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tipo Dependientes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idtipo_dependientes',
            'tipo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TipoDependientes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idtipo_dependientes' => $model->idtipo_dependientes]);
                 }
            ],
        ],
    ]); ?>


</div>
