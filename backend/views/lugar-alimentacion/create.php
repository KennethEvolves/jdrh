<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\LugarAlimentacion $model */

$this->title = 'Formulario Lugares de Alimentación';
$this->params['breadcrumbs'][] = ['label' => 'Alimentacion', 'url' => ['alimentacion/index']];
$this->params['breadcrumbs'][] = ['label' => 'Lugar Alimentacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lugar-alimentacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
