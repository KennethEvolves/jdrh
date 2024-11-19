<?php

use backend\models\MotivosEstudioLicenciatura;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\MotivosEstudioLicenciaturaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Motivos Estudio Licenciaturas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motivos-estudio-licenciatura-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Motivos Estudio Licenciatura', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_motivosEstudioLicenciatura',
            'motivos',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, MotivosEstudioLicenciatura $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_motivosEstudioLicenciatura' => $model->id_motivosEstudioLicenciatura]);
                 }
            ],
        ],
    ]); ?>


</div>
