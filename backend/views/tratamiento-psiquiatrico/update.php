<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\TratamientoPsiquiatrico $model */

$this->title = 'Update Tratamiento Psiquiatrico: ' . $model->id_tratamientoPsiquiatrico;
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = ['label' => 'Tratamiento Psiquiatricos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tratamientoPsiquiatrico, 'url' => ['view', 'id_tratamientoPsiquiatrico' => $model->id_tratamientoPsiquiatrico]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tratamiento-psiquiatrico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
