<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Vivienda $model */

$this->title = 'Update Vivienda: ' . $model->id_vivienda;
$this->params['breadcrumbs'][] = ['label' => 'Ambiente Socioeconomico', 'url' => ['ambiente-socioeconomico/index']];
$this->params['breadcrumbs'][] = ['label' => 'Viviendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_vivienda, 'url' => ['view', 'id_vivienda' => $model->id_vivienda]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vivienda-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
