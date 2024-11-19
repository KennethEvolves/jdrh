<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\EscalaConsumo $model */

$this->title = 'Escalas de Consumo';
$this->params['breadcrumbs'][] = ['label' => 'Alimentacion', 'url' => ['alimentacion/index']];
$this->params['breadcrumbs'][] = ['label' => 'Escala Consumos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escala-consumo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
