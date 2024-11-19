<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Servicios $model */

$this->title = 'Update Servicios: ' . $model->id_servicios;
$this->params['breadcrumbs'][] = ['label' => 'Ambiente Socioeconomico', 'url' => ['ambiente-socioeconomico/index']];
$this->params['breadcrumbs'][] = ['label' => 'Servicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_servicios, 'url' => ['view', 'id_servicios' => $model->id_servicios]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="servicios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
