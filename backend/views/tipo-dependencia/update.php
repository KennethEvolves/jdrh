<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\TipoDependencia $model */

$this->title = 'Update Tipo Dependencia: ' . $model->idtipo_dependencia;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Dependencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtipo_dependencia, 'url' => ['view', 'idtipo_dependencia' => $model->idtipo_dependencia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-dependencia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
