<?php

use backend\models\Grupo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\GrupoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Grupos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grupo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Grupo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_grupo',
            'nombre',
            'capacidad',
            'ubicacion:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Grupo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_grupo' => $model->id_grupo]);
                 }
            ],
        ],
    ]); ?>


</div>
