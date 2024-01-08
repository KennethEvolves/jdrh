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

            [
                'attribute' => 'id_carrera',
                'label' => 'Carrera ' // Cambia el nombre de la columna clave
            ],
            'nombre',
            [
                'attribute' => 'clave',
                'label' => 'Clave de la Carrera' // Cambia el nombre de la columna clave
            ],
            'creditos',
            [
                'attribute' => 'cred_serv_social',
                'label' => 'Créditos Servicio Social', // Cambia el nombre de la columna cred_serv_social
            ],
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
