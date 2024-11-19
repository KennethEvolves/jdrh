<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Bienes $model */

$this->title = 'Update Bienes: ' . $model->id_bienes;
$this->params['breadcrumbs'][] = ['label' => 'Ambiente Socioeconomico', 'url' => ['ambiente-socioeconomico/index']];
$this->params['breadcrumbs'][] = ['label' => 'Bienes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_bienes, 'url' => ['view', 'id_bienes' => $model->id_bienes]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bienes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
