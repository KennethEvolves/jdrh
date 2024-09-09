<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\UnidadEstudio $model */

$this->title = $model->nombre_asignatura;
$this->params['breadcrumbs'][] = ['label' => 'Unidad Estudios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="unidad-estudio-view">
    

<!-- coloca las imagenes en el encabezado y el titulo -->
<table width="100%">
    
    <tr>
        <!-- <td  align="left"><img src="archivos/sies2.png" width="300" ></td> -->
        <td  align="right"><img src="archivos/normal.png" width="80" ></td>
        
        
    </tr>
</table>

 <h4 style="text-align: center; font-weight: bold;">Escuela Normal <br>Juan De Dios Rodriguez Heredia</h4>
    <h4 style="text-align: center;">Reporte de Unidad de Estudio</h4>

    <h1><?= Html::encode($this->title) ?></h1>






    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id_unidad',
            [
                'attribute' => 'id_unidad',
                'label' => 'Unidad ' // Cambia el nombre de la columna clave
            ],

            'clave',
            // 'nombre_asignatura',
            [
                'attribute' => 'nombre_asignatura',
                'label' => 'Nombre De La Asignatura ' 
            ],

            // 'creditos_asignatura',
            [
                'attribute' => 'creditos_asignatura',
                'label' => 'Creditos De La Asignatura ' 
            ],
            // 'des_general:ntext',
            [
                'attribute' => 'des_general',
                'label' => 'Descripcion General ' 
            ],
            // 'ras_perfil:ntext',
            [
                'attribute' => 'ras_perfil',
                'label' => 'Rasgos del perfil ' 
            ],
            // 'sabe_profesionales:ntext',
            [
                'attribute' => 'sabe_profesionales',
                'label' => 'Saberes Profesionales ' 
            ],
            // 'elem_universo:ntext',
            [
                'attribute' => 'elem_universo',
                'label' => 'Elementos del universo ' 
            ],
            // 'num_momentos',
            [
                'attribute' => 'num_momentos',
                'label' => 'Numero de momentos' 
            ],
            'satca',
            'semestre',
            // 'plan_estudios_id_plan',
            [
                'attribute' => 'plan_estudios_id_plan',
                'label' => 'Numero de momentos' 
            ],
            // 'fases_id_fase',
            [
                'attribute' => 'fases_id_fase',
                'label' => 'Fases' 
            ],
        ],
    ]) ?>

</div>
