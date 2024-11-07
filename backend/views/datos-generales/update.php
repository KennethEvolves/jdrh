<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\DatosGenerales $model */

$this->title = 'Update Datos Generales: ' . $model->iddatos_generales;
$this->params['breadcrumbs'][] = ['label' => 'Datos Generales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddatos_generales, 'url' => ['view', 'iddatos_generales' => $model->iddatos_generales]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="datos-generales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
