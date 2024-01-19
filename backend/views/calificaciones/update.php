<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Calificaciones $model */

$this->title = 'Update Calificaciones: ' . $model->id_calificacion;
$this->params['breadcrumbs'][] = ['label' => 'Calificaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_calificacion, 'url' => ['view', 'id_calificacion' => $model->id_calificacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="calificaciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
