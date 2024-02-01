<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Alimentacion $model */

$this->title = 'Create Alimentacion';
$this->params['breadcrumbs'][] = ['label' => 'Alimentacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alimentacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
