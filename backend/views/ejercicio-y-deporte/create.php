<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\EjercicioYDeporte $model */

$this->title = 'Crear Ejercicio Y Deporte';
$this->params['breadcrumbs'][] = ['label' => 'Ejercicio Y Deporte', 'url' => ['index']];
$this->params['breadcrumbs'][''] = $this->title;
?>
<div class="ejercicio-ydeporte-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
