<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Deporte $model */

$this->title = 'Crear Deporte';
$this->params['breadcrumbs'][] = ['label' => 'Ejercicio Y Deporte', 'url' => ['ejercicio-y-deporte/index']];
$this->params['breadcrumbs'][] = ['label' => 'Deporte', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deporte-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
