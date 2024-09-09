<?php

use backend\models\TipoEstadocivil;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\TipoEstadocivilSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tipo Estadocivils';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-estadocivil-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tipo Estadocivil', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idtipo_estadocivil',
            'descripcion',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TipoEstadocivil $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idtipo_estadocivil' => $model->idtipo_estadocivil]);
                 }
            ],
        ],
    ]); ?>


</div>
