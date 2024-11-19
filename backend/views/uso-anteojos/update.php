<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\UsoAnteojos $model */

$this->title = 'Update Uso Anteojos: ' . $model->id_usoAnteojos;
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = ['label' => 'Uso Anteojos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_usoAnteojos, 'url' => ['view', 'id_usoAnteojos' => $model->id_usoAnteojos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="uso-anteojos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
