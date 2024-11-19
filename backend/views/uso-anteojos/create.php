<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\UsoAnteojos $model */

$this->title = 'Uso Anteojos';
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = ['label' => 'Uso Anteojos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uso-anteojos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
