<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Tiempo $model */

$this->title = 'Formulario de tiempos';
$this->params['breadcrumbs'][] = ['label' => 'Ambiente Socioeconomico', 'url' => ['ambiente-socioeconomico/index']];
$this->params['breadcrumbs'][] = ['label' => 'Tiempos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tiempo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
