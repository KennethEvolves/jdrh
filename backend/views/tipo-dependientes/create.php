<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\TipoDependientes $model */

$this->title = 'Create Tipo Dependientes';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Dependientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-dependientes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
