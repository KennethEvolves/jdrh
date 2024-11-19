<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\FrecuenciaDentista $model */

$this->title = 'Frecuencia Dentista: ' . $model->id_frecuenciaDentista;
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = ['label' => 'Frecuencia Dentista', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_frecuenciaDentista, 'url' => ['view', 'id_frecuenciaDentista' => $model->id_frecuenciaDentista]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="frecuencia-dentista-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
