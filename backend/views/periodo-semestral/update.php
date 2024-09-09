<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\PeriodoSemestral $model */

$this->title = 'Update Periodo Semestral: ' . $model->id_ciclo;
$this->params['breadcrumbs'][] = ['label' => 'Periodo Semestrals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ciclo, 'url' => ['view', 'id_ciclo' => $model->id_ciclo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="periodo-semestral-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
