<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Adicciones $model */

$this->title = $model->id_adicciones;
$this->params['breadcrumbs'][] = ['label' => 'Habitos', 'url' => ['habitos/index']];
$this->params['breadcrumbs'][] = ['label' => 'Adicciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="adicciones-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id_adicciones' => $model->id_adicciones], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_adicciones' => $model->id_adicciones], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro de querer eliminar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_adicciones',
            'tipo_adicciones',
        ],
    ]) ?>

</div>
