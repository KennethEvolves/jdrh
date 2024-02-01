<?php

use backend\models\UnidadEstudio;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;


use kartik\dynagrid\DynaGrid;
use kartik\export\ExportMenu;
use kartik\icons\Icon;
Icon::map($this); 

/** @var yii\web\View $this */
/** @var backend\models\search\UnidadEstudioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Unidad Estudios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidad-estudio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Unidad Estudio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            [
                'attribute' => 'id_unidad',
                'label' => 'Unidad ' // Cambia el nombre de la columna clave
            ],
            
            'clave',
            'nombre_asignatura',
            'creditos_asignatura',
            'des_general:ntext',
            //'ras_perfil:ntext',
            //'sabe_profesionales:ntext',
            //'elem_universo:ntext',
            //'num_momentos',
            //'satca',
            //'semestre',
            //'plan_estudios_id_plan',
            //'fases_id_fase',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, UnidadEstudio $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_unidad' => $model->id_unidad]);
                 }
            ],
        ],
    ]); ?> -->

<?php 
    // Define las columnas
    
    $columns = [
        
        ['class' => 'yii\grid\SerialColumn'],

            
            // [
            //     'attribute' => 'id_unidad',
            //     'label' => 'Unidad ' // Cambia el nombre de la columna clave
            // ],
        'clave',
        'nombre_asignatura',
        'creditos_asignatura',
        
        // 'des_general:ntext',
        [
            'attribute' => 'des_general',
            'label' => 'Descripción General',
            'format' => 'raw',  // Utiliza 'raw' para permitir HTML
        ],
        [
            'class' => ActionColumn::class,
            'urlCreator' => function ($action, UnidadEstudio $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id_unidad' => $model->id_unidad]);
             }
        ],
        
    ];


    $dynagrid = DynaGrid::begin([
        'columns' => $columns,
        'theme'=>'panel-info',
        'showPersonalize'=>true,
        'storage' => 'session',
        'gridOptions'=>[
            'dataProvider'=>$dataProvider,
            'filterModel'=>$searchModel,
            'showPageSummary'=>true,
            'responsive' => false,
            'responsiveWrap'=>false,
            'floatHeader'=>true,
            'headerContainer' => ['class' => 'kv-table-header', 'style' => 'top: 50px'],
            'pjax'=>true,
            'panel'=>[
                'heading'=>'<h3 class="panel-title"></i>  Unidad de estudios</h3>',
                'before' =>  '<div style="padding-top: 7px;"><em> Si desea generar un reporte, puede utilizar las opciones siguientes </em></div>',
                'after' => false
            ],
                // set a label for default menu
         
            'toolbar' =>  [ 
                ['content' => '{dynagrid}'],
                
                 ExportMenu::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => $columns,
                    'filename'=>'Reporte de Unidad de estudios',
                     
                    'contentBefore' => [
                        
                        ['value' => 'REPORTE DE UNIDAD DE ESTUDIOS'],
                        [
                            'value' => '&nbsp;', // Espacio en blanco HTML
                            'format' => 'raw', // Indica que el valor se debe interpretar como HTML
                        ],
                    ],
    
                    'dropdownOptions' => [
                        'label' => 'Exportar',
                        'class' => 'btn btn-default'
                    ]
                    
                ])
                
                
            ]
        ],
        'options'=>['id'=>'dynagrid-1'] // a unique identifier is important
    ]);
    if (substr($dynagrid->theme, 0, 6) == 'simple') {
        $dynagrid->gridOptions['panel'] = false;
    }  
    DynaGrid::end();
     ?>


</div>
