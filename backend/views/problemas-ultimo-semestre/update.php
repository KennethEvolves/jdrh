<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\ProblemasUltimoSemestre $model */

$this->title = 'Problemas Ultimo Semestre: ' . $model->id_problemasUltimoSemestre;
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = ['label' => 'Problemas Ultimo Semestres, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_problemasUltimoSemestre, 'url' => ['view', 'id_problemasUltimoSemestre' => $model->id_problemasUltimoSemestre]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="problemas-ultimo-semestre-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
