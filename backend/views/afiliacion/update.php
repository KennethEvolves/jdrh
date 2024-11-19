<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Afiliacion $model */

$this->title = 'Afiliacion: ' . $model->id_afiliacionEscuela;
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = ['label' => 'Afiliacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_afiliacionEscuela, 'url' => ['view', 'id_afiliacionEscuela' => $model->id_afiliacionEscuela]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="afiliacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
