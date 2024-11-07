<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\MotivosEstudioLicenciatura $model */

$this->title = $model->id_motivosEstudioLicenciatura;
$this->params['breadcrumbs'][] = ['label' => 'Motivos Estudio Licenciaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="motivos-estudio-licenciatura-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_motivosEstudioLicenciatura' => $model->id_motivosEstudioLicenciatura], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_motivosEstudioLicenciatura' => $model->id_motivosEstudioLicenciatura], [
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
            'id_motivosEstudioLicenciatura',
            'motivos',
        ],
    ]) ?>

</div>
