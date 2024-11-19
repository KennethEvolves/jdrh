<?php

use backend\models\LugarAcceso;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\LugarAccesoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Lugar Accesos';
$this->params['breadcrumbs'][] = ['label' => 'Recreacion Y Tiempo Libre', 'url' => ['recreacion-y-tiempo-libre/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lugar-acceso-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Lugar Acceso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_lugarAcceso',
            'tipo_acceso',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, LugarAcceso $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_lugarAcceso' => $model->id_lugarAcceso]);
                 }
            ],
        ],
    ]); ?>


</div>
