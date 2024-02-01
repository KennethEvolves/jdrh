<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Expediente $model */

$this->title = 'Update Expediente: ' . $model->idexpediente;
$this->params['breadcrumbs'][] = ['label' => 'Expedientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idexpediente, 'url' => ['view', 'idexpediente' => $model->idexpediente]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="expediente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
