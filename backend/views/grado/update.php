<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Grado $model */

$this->title = 'Update Grado: ' . $model->id_grado;
$this->params['breadcrumbs'][] = ['label' => 'Grados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_grado, 'url' => ['view', 'id_grado' => $model->id_grado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="grado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
