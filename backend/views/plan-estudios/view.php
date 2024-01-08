<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\PlanEstudios $model */

$this->title = $model->id_plan;
$this->params['breadcrumbs'][] = ['label' => 'Plan Estudios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="plan-estudios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_plan' => $model->id_plan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_plan' => $model->id_plan], [
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
            
            [
                'attribute' => 'id_plan',
                'label' => 'Plan ' // Cambia el nombre de la columna clave
            ],
            'nombre',
            // 'fecha_autorizacion',
            [
                'attribute' => 'fecha_autorizacion',
                'label' => 'Fecha De Autorización ' // Cambia el nombre de la columna clave
            ],
            'vigencia',
            'estado',
            'observaciones:ntext',
            
            [
                'attribute' => 'carrera_id_carrera',
                'label' => 'Carrera ' // Cambia el nombre de la columna clave
            ],
            
        ],
    ]) ?>

</div>
