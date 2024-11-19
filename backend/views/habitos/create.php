<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Habitos $model */

$this->title = 'Formulario Habitos';
$this->params['breadcrumbs'][] = ['label' => 'Habitos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="habitos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
