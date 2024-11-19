<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Organizacion $model */

$this->title = 'Actualizar Organizacion: ' . $model->id_participacionOrganizacion;
$this->params['breadcrumbs'][] = ['label' => 'Recreacion Y Tiempo Libre', 'url' => ['recreacion-y-tiempo-libre/index']];
$this->params['breadcrumbs'][] = ['label' => 'Organizacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_participacionOrganizacion, 'url' => ['view', 'id_participacionOrganizacion' => $model->id_participacionOrganizacion]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="organizacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
