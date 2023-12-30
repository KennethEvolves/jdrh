<?php

use backend\models\Carrera;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\CarreraSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Carreras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carrera-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Carrera', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_carrera',
            'nombre',
            'clave',
            'creditos',
            'cred_serv_social',
            //'descripcion:ntext',
            //'carreracol',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Carrera $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_carrera' => $model->id_carrera]);
                 }
            ],
        ],
    ]); ?>


</div>
