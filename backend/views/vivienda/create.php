<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Vivienda $model */

$this->title = 'Formulario tipos de vivienda';
$this->params['breadcrumbs'][] = ['label' => 'Ambiente Socioeconomico', 'url' => ['ambiente-socioeconomico/index']];
$this->params['breadcrumbs'][] = ['label' => 'Viviendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vivienda-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
