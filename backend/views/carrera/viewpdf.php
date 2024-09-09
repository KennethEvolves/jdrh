<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\search\PlanEstudiosSearch;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;
use backend\models\PlanEstudios;
use backend\models\carrera;
use yii\helpers\ArrayHelper;



/** @var yii\web\View $this */
/** @var backend\models\Carrera $model */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Carreras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="carrera-view">



<!-- coloca las imagenes en el encabezado y el titulo -->
<table width="100%">
    
    <tr>
        <!-- <td  align="left"><img src="archivos/sies2.png" width="300" ></td> -->
        <td  align="right"><img src="archivos/normal.png" width="80" ></td>
        
        
    </tr>
</table>

 <h4 style="text-align: center; font-weight: bold;">Escuela Normal <br>Juan De Dios Rodriguez Heredia</h4>
    <h4 style="text-align: center;">Reporte de Carrrera</h4>

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'id_carrera',
                'label' => 'Carrera ' // Cambia el nombre de la columna clave
            ],
            'nombre',
            'clave',
            'creditos',
            [
                'attribute' => 'cred_serv_social',
                'label' => 'Creditos de Servicio Social ' // Cambia el nombre de la columna clave
            ],
            'descripcion:ntext',
            'carreracol',
        ],
    ]) ?>

    
   
    


</div>
