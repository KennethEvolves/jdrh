<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\DatosFamiliares $model */

$this->title = 'Update Datos Familiares: ' . $model->iddatos_familiares;
$this->params['breadcrumbs'][] = ['label' => 'Datos Familiares', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddatos_familiares, 'url' => ['view', 'iddatos_familiares' => $model->iddatos_familiares]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="datos-familiares-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
