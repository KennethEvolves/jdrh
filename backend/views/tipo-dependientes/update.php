<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\TipoDependientes $model */

$this->title = 'Update Tipo Dependientes: ' . $model->idtipo_dependientes;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Dependientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtipo_dependientes, 'url' => ['view', 'idtipo_dependientes' => $model->idtipo_dependientes]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-dependientes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
