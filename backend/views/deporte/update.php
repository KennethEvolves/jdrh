<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Deporte $model */

$this->title = 'Actualizar Deporte: ' . $model->id_deporte;
$this->params['breadcrumbs'][] = ['label' => 'Ejercicio Y Deporte', 'url' => ['ejercicio-y-deporte/index']];
$this->params['breadcrumbs'][] = ['label' => 'Deporte', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_deporte, 'url' => ['view', 'id_deporte' => $model->id_deporte]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="deporte-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
