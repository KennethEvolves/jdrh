<?php

use backend\models\LugarAlimentacion;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\LugarAlimentacionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Lugar de Alimentación';
$this->params['breadcrumbs'][] = ['label' => 'Alimentacion', 'url' => ['alimentacion/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lugar-alimentacion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Formulario lugares de alimentación', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_lugarAlimentacion',
            'tipo_lugar',
            'id_escala',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, LugarAlimentacion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_lugarAlimentacion' => $model->id_lugarAlimentacion]);
                 }
            ],
        ],
    ]); ?>


</div>
