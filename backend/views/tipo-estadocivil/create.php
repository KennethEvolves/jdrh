<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\TipoEstadocivil $model */

$this->title = 'Create Tipo Estadocivil';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Estadocivils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-estadocivil-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
