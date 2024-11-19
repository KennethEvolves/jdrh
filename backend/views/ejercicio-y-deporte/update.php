<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\EjercicioYDeporte $model */

$this->title = 'Actualizar Ejercicio Y Deporte: ' . $model->id_ejercicioDeporte;
$this->params['breadcrumbs'][] = ['label' => 'Ejercicio Y Deporte', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ejercicioDeporte, 'url' => ['view', 'id_ejercicioDeporte' => $model->id_ejercicioDeporte]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="ejercicio-ydeporte-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
