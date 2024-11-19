<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\TratamientoPsicologico $model */

$this->title = 'Tratamiento Psicologico';
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = ['label' => 'Tratamiento Psicologico', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tratamiento-psicologico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
