<?php

use backend\models\DatosFamiliares;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\DatosFamiliaresSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Datos Familiares';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datos-familiares-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Datos Familiares', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'iddatos_familiares',
            'estado_civil',
            'numero_hijos',
            'edades_hijos',
            'tipo_beca',
            //'dependencia_economica',
            //'dependientes_economico',
            //'empresa_trabajas',
            //'puesto_trabajas',
            //'horario_trabajas',
            //'id_civill',
            //'id_tiposbeca',
            //'id_familiares',
            //'id_tipo_dependientes',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, DatosFamiliares $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'iddatos_familiares' => $model->iddatos_familiares]);
                 }
            ],
        ],
    ]); ?>


</div>
