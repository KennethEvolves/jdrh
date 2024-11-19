<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\RecreacionYTiempoLibre $model */

$this->title = $model->id_recreacionTiempoLibre;
$this->params['breadcrumbs'][] = ['label' => 'Recreacion Y Tiempo Libre', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="recreacion-ytiempo-libre-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id_recreacionTiempoLibre' => $model->id_recreacionTiempoLibre], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_recreacionTiempoLibre' => $model->id_recreacionTiempoLibre], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro de querer eliminar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_recreacionTiempoLibre',
            'uso_internet',
            'acceso_internet',
            'cuestionamiento_usoInternet',
            'areasInteres:ntext',
            'id_lugarAcceso',
            'id_participacionOrganizacion',
            'id_interesesPersonales',
        ],
    ]) ?>

</div>
