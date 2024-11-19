<?php

use backend\models\Organizacion;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\OrganizacionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Organizacion';
$this->params['breadcrumbs'][] = ['label' => 'Recreacion Y Tiempo Libre', 'url' => ['recreacion-y-tiempo-libre/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizacion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Organizacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_participacionOrganizacion',
            'tipo_organizacion',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Organizacion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_participacionOrganizacion' => $model->id_participacionOrganizacion]);
                 }
            ],
        ],
    ]); ?>


</div>
