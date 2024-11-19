<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\UsoPersonal $model */

$this->title = 'Formulario articulos de uso personal';
$this->params['breadcrumbs'][] = ['label' => 'Ambiente Socioeconomico', 'url' => ['ambiente-socioeconomico/index']];
$this->params['breadcrumbs'][] = ['label' => 'Uso Personal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uso-personal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
