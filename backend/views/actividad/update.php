<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Actividad $model */

$this->title = 'Update Actividad: ' . $model->id_actividad;
$this->params['breadcrumbs'][] = ['label' => 'Ejercicio Y Deporte', 'url' => ['ejercicio-y-deporte/index']];
$this->params['breadcrumbs'][] = ['label' => 'Actividad', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_actividad, 'url' => ['view', 'id_actividad' => $model->id_actividad]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="actividad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
