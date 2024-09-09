<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Asignaciones $model */

$this->title = 'Create Asignación';
$this->params['breadcrumbs'][] = ['label' => 'Asignaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignaciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
