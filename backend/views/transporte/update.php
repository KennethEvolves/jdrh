<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Transporte $model */

$this->title = 'Update Transporte: ' . $model->id_transporte;
$this->params['breadcrumbs'][] = ['label' => 'Ambiente Socioeconomico', 'url' => ['ambiente-socioeconomico/index']];
$this->params['breadcrumbs'][] = ['label' => 'Transportes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_transporte, 'url' => ['view', 'id_transporte' => $model->id_transporte]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transporte-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
