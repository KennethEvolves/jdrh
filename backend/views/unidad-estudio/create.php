<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\UnidadEstudio $model */

$this->title = 'Create Unidad Estudio';
$this->params['breadcrumbs'][] = ['label' => 'Unidad Estudios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidad-estudio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>