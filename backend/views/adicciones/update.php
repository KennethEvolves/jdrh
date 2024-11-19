<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Adicciones $model */

$this->title = 'Actualizar Adicciones: ' . $model->id_adicciones;
$this->params['breadcrumbs'][] = ['label' => 'Habitos', 'url' => ['habitos/index']];
$this->params['breadcrumbs'][] = ['label' => 'Adicciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_adicciones, 'url' => ['view', 'id_adicciones' => $model->id_adicciones]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="adicciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
