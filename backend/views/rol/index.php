<?php

use backend\models\Rol;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\RolSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Rols';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Rol', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',

            // 'rol_nombre',
            [
                'attribute' => 'rol_nombre',
                'label' => 'Rol  ' // Cambia el nombre de la columna clave
            ],

            // 'rol_valor',
            [
                'attribute' => 'rol_valor',
                'label' => 'Valor ' // Cambia el nombre de la columna clave
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Rol $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
