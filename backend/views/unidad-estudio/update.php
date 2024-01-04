<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\UnidadEstudio $model */

$this->title = 'Update Unidad Estudio: ' . $model->id_unidad;
$this->params['breadcrumbs'][] = ['label' => 'Unidad Estudios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_unidad, 'url' => ['view', 'id_unidad' => $model->id_unidad]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unidad-estudio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
