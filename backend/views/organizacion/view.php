<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Organizacion $model */

$this->title = $model->id_participacionOrganizacion;
$this->params['breadcrumbs'][] = ['label' => 'Recreacion Y Tiempo Libre', 'url' => ['recreacion-y-tiempo-libre/index']];
$this->params['breadcrumbs'][] = ['label' => 'Organizacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="organizacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id_participacionOrganizacion' => $model->id_participacionOrganizacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_participacionOrganizacion' => $model->id_participacionOrganizacion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_participacionOrganizacion',
            'tipo_organizacion',
        ],
    ]) ?>

</div>
