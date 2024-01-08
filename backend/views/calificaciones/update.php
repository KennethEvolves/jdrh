<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Calificaciones $model */

$this->title = 'Update Calificaciones: ' . $model->id_calificaciones;
$this->params['breadcrumbs'][] = ['label' => 'Calificaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_calificaciones, 'url' => ['view', 'id_calificaciones' => $model->id_calificaciones]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="calificaciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
