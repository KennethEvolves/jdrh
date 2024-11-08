<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Grupo $model */

$this->title = 'Update Grupo: ' . $model->id_grupo;
$this->params['breadcrumbs'][] = ['label' => 'Grupos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_grupo, 'url' => ['view', 'id_grupo' => $model->id_grupo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="grupo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
