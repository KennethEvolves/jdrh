<?php

use backend\models\EscalaConsumo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\EscalaConsumoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Escalas de Consumos';
$this->params['breadcrumbs'][] = ['label' => 'Alimentacion', 'url' => ['alimentacion/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escala-consumo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Escalas de Consumo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_escala',
            'descripcion_frecuencia',
            'valor_escala',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, EscalaConsumo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_escala' => $model->id_escala]);
                 }
            ],
        ],
    ]); ?>


</div>
