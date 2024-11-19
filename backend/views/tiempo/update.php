<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Tiempo $model */

$this->title = 'Update Tiempo: ' . $model->id_tiempo;
$this->params['breadcrumbs'][] = ['label' => 'Ambiente Socioeconomico', 'url' => ['ambiente-socioeconomico/index']];
$this->params['breadcrumbs'][] = ['label' => 'Tiempos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tiempo, 'url' => ['view', 'id_tiempo' => $model->id_tiempo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tiempo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
