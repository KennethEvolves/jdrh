<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\FrecuenciaDentista $model */

$this->title = 'Frecuencia Dentista';
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = ['label' => 'Frecuencia Dentista', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frecuencia-dentista-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
