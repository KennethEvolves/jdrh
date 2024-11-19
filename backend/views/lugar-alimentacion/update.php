<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\LugarAlimentacion $model */

$this->title = 'Update Lugar Alimentacion: ' . $model->id_lugarAlimentacion;
$this->params['breadcrumbs'][] = ['label' => 'Alimentacion', 'url' => ['alimentacion/index']];
$this->params['breadcrumbs'][] = ['label' => 'Lugar Alimentacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_lugarAlimentacion, 'url' => ['view', 'id_lugarAlimentacion' => $model->id_lugarAlimentacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lugar-alimentacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
