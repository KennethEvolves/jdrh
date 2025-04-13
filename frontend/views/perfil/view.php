<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\PermisosHelpers;

/**
 * @var yii\web\View $this
 * @var frontend\models\Perfil $model
 */

$this->title = "Perfil de " . $model->user->username;

$this->params['breadcrumbs'][] = ['label' => 'Perfil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="perfil-view container mt-5">

    <!-- Header Section -->
    <div class="header-section text-center mb-8">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <h2 class="h3 font-weight-light text-muted">Detalles del perfil de usuario: <?= $model->user->username ?></h2>
    </div>

    <!-- Detalles del perfil -->
    <div class="detail-view-section">
        <?= DetailView::widget([
            'model' => $model,
            'options' => ['class' => 'table table-bordered table-striped'],
            'attributes' => [
                'user.username',
                'nombre',
                'apellido',
                'fecha_nacimiento',
                'genero.genero_nombre',
                'telefono',
                'domicilio',
                'correo_personal',
                'correo_institucional',
                'curp',
                'tel_emerg_principal',
                [
                    'label' => 'Maya hablante',
                    'value' => $model->maya_hablante ? 'Sí' : 'No',  // Muestra "Sí" o "No"
                ],
                'ciudad_nacimiento',
                'estado_nacimiento',
                'pagina_web',
                'created_at',
                'updated_at',
            ],
        ]) ?>
    </div>

    <!-- Botones de acción en la parte inferior derecha -->
    <div class="d-flex justify-content-end mt-4">
        <?php if (PermisosHelpers::userDebeSerPropietario('perfil', $model->id)): ?>
            <?= Html::a(
                '<i class="fas fa-edit mr-2"></i> Actualizar',
                ['update', 'id' => $model->id],
                [
                    'class' => 'btn btn-outline-primary btn-lg px-5',  // Botón con borde
                    'title' => 'Actualizar Perfil',
                    'aria-label' => 'Actualizar'
                ]
            ) ?>
        <?php endif; ?>
        <?= Html::a(
            '<i class="fas fa-trash-alt mr-2"></i> Eliminar',
            ['delete', 'id' => $model->id],
            [
                'class' => 'btn btn-outline-danger btn-lg px-5 ms-3',  // Botón con borde
                'data' => [
                    'confirm' => '¿Estás seguro de que deseas eliminar este perfil?',
                    'method' => 'post',
                ],
                'title' => 'Eliminar Perfil',
                'aria-label' => 'Eliminar'
            ]
        ) ?>
    </div>

</div>
