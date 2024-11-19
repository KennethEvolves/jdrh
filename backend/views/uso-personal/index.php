<?php

use backend\models\UsoPersonal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\UsoPersonalSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Uso Personal';
$this->params['breadcrumbs'][] = ['label' => 'Ambiente Socioeconomico', 'url' => ['ambiente-socioeconomico/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uso-personal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Formulario de articulos de uso personal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_usoPersonal',
            'tipo_usoPersonal',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, UsoPersonal $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_usoPersonal' => $model->id_usoPersonal]);
                 }
            ],
        ],
    ]); ?>


</div>
