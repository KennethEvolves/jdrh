<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\AmbienteSocioeconomico $model */

$this->title = 'Formulario de ambiente socioeconomico';
$this->params['breadcrumbs'][] = ['label' => 'Ambiente Socioeconomicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ambiente-socioeconomico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
