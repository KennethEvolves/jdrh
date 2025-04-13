<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\PermisosHelpers;
use kartik\icons\Icon;
Icon::map($this); 

/** @var yii\web\View $this */
/** @var backend\models\InformacionAcademica $model */

$this->title = 'Información Académica: ' . $model->inf_academica_id;
$mostrar_esta_nav = PermisosHelpers::requerirMinimoRol('SuperUsuario');

$this->params['breadcrumbs'][] = ['label' => 'Información Académica', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="informacion-academica-view" style="font-family: Arial, sans-serif; line-height: 1.6; padding: 20px;">

    <!-- Encabezado con logo -->
    <table width="100%" style="border-bottom: 1px solid #ccc; padding-bottom: 20px;">
        <tr>
            <td align="left"><img src="archivos/sies2.png" width="300" alt="Escuela Normal" ></td>
            <td align="right"><img src="archivos/normal.png" width="80" alt="Logo" ></td>
        </tr>
    </table>

    <!-- Títulos y subtítulos -->
    <h2 style="text-align: center; font-weight: bold; color: #2c3e50;">Escuela Normal Juan De Dios Rodriguez Heredia</h2>
    <h3 style="text-align: center; font-weight: normal; color: #7f8c8d;">Reporte de Información Académica</h3>

    <!-- Título de la información académica -->
    <h1 style="text-align: center; font-size: 24px; margin-top: 30px;"><?= Html::encode($this->title) ?></h1>

    <!-- Detalle de la información académica con formato -->
    <div style="margin-top: 30px;">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                ['attribute' => 'inf_academica_id', 'label' => 'ID de Información Académica'],
                'estudio_adicional',
                'horas_estudio_diario',
                'actividad_extraescolar',
                [
                    'label' => 'Motivos de Estudio',
                    'value' => $model->motivosEstudios ? implode(', ', array_map(fn($motivo) => Html::encode($motivo->nombre_motivo), $model->motivosEstudios)) : 'No se seleccionaron motivos de estudio',
                    'format' => 'raw',
                ],
                [
                    'label' => 'Temas de Capacitación',
                    'value' => $model->temasCapacitaciones ? implode(', ', array_map(fn($tema) => Html::encode($tema->nombre_tema), $model->temasCapacitaciones)) : 'No se seleccionaron temas de capacitación',
                    'format' => 'raw',
                ],
                [
                    'label' => 'Talleres de Interés',
                    'value' => $model->talleresInteres ? implode(', ', array_map(fn($taller) => Html::encode($taller->nombre_taller), $model->talleresInteres)) : 'No se seleccionaron talleres de interés',
                    'format' => 'raw',
                ],
            ],
            'options' => [
                'class' => 'table table-bordered table-striped',
                'style' => 'width: 100%; margin-top: 20px; border: 1px solid #ddd;'
            ],
        ]) ?>
    </div>

    <!-- Pie de página -->
    <div style="position: fixed; bottom: 20px; left: 0; width: 100%; text-align: center; font-size: 12px; color: #7f8c8d;">
        <p>&copy; <?= date('Y') ?> Escuela Normal Juan De Dios Rodriguez Heredia. Todos los derechos reservados.</p>
    </div>
</div>
