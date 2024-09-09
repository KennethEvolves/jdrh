<?php

use backend\models\DatosGenerales;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\DatosGeneralesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Datos Generales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datos-generales-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Datos Generales', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'iddatos_generales',
            'licenciatura:ntext',
            'generacion',
            'nombre_padre',
            'ocupcion_padre',
            //'nombre_madre',
            //'ocupacion_madre',
            //'telefono',
            //'lugar_nacimiento',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, DatosGenerales $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'iddatos_generales' => $model->iddatos_generales]);
                 }
            ],
        ],
    ]); ?>


</div>
