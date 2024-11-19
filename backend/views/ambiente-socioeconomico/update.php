<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\AmbienteSocioeconomico $model */

$this->title = 'Update Ambiente Socioeconomico: ' . $model->id_ambienteSocioeconomico;
$this->params['breadcrumbs'][] = ['label' => 'Ambiente Socioeconomicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ambienteSocioeconomico, 'url' => ['view', 'id_ambienteSocioeconomico' => $model->id_ambienteSocioeconomico]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ambiente-socioeconomico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
