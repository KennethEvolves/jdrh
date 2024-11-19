<?php

use backend\models\InteresesPersonales;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\InteresesPersonalesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Intereses Personales';
$this->params['breadcrumbs'][] = ['label' => 'Recreacion Y Tiempo Libre', 'url' => ['recreacion-y-tiempo-libre/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="intereses-personales-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Intereses Personales', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_interesesPersonales',
            'tipo_interesesPersonales',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, InteresesPersonales $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_interesesPersonales' => $model->id_interesesPersonales]);
                 }
            ],
        ],
    ]); ?>


</div>
