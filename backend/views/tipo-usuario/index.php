<?php

use backend\models\TipoUsuario;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\TipoUsuarioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tipo Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tipo Usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            
            // 'tipo_usuario_nombre'
            [
                'attribute' => 'tipo_usuario_nombre',
                'label' => 'Tipo De Usuario' // Cambia el nombre de la columna clave
            ],


            // 'tipo_usuario_valor',
            [
                'attribute' => 'tipo_usuario_valor',
                'label' => 'Valor ' // Cambia el nombre de la columna clave
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TipoUsuario $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
