<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\TipoDependencia $model */

$this->title = 'Create Tipo Dependencia';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Dependencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-dependencia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
