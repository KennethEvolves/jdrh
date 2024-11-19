<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Bienes $model */

$this->title = 'Formulario de Bienes';
$this->params['breadcrumbs'][] = ['label' => 'Ambiente Socioeconomico', 'url' => ['ambiente-socioeconomico/index']];
$this->params['breadcrumbs'][] = ['label' => 'Bienes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bienes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
