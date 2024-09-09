<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Asignaciones $model */

$this->title = 'Update Asignación: ' . $model->grupo_id_grupo;
$this->params['breadcrumbs'][] = ['label' => 'Asignaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->grupo_id_grupo, 'url' => ['view', 'grupo_id_grupo' => $model->grupo_id_grupo, 'periodo_semestral_id_ciclo' => $model->periodo_semestral_id_ciclo, 'unidad_estudio_id_unidad' => $model->unidad_estudio_id_unidad]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asignaciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
