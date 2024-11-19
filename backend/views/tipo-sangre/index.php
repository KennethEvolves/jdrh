<?php

use backend\models\TipoSangre;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\TipoSangreSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tipo Sangre';
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-sangre-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tipo Sangre', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tipoSangre',
            'tipo_sangre',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TipoSangre $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_tipoSangre' => $model->id_tipoSangre]);
                 }
            ],
        ],
    ]); ?>


</div>
