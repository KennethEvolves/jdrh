<?php

use backend\models\Adicciones;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\AdiccionesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Adicciones';
$this->params['breadcrumbs'][] = ['label' => 'Habitos', 'url' => ['habitos/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adicciones-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Adicciones', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_adicciones',
            'tipo_adicciones',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Adicciones $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_adicciones' => $model->id_adicciones]);
                 }
            ],
        ],
    ]); ?>


</div>
