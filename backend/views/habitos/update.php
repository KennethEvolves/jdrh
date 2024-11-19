<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Habitos $model */

$this->title = 'Actualizar Habitos: ' . $model->id_habitos;
$this->params['breadcrumbs'][] = ['label' => 'Habitos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_habitos, 'url' => ['view', 'id_habitos' => $model->id_habitos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="habitos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
