<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\TratamientoPsiquiatrico $model */

$this->title = 'Tratamiento Psiquiatrico';
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = ['label' => 'Tratamiento Psiquiatricos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tratamiento-psiquiatrico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
