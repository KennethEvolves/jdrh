<?php

use backend\models\Carrera;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use kartik\dynagrid\DynaGrid;
use kartik\export\ExportMenu;
use kartik\icons\Icon;
Icon::map($this); 

/** @var yii\web\View $this */
/** @var backend\models\search\CarreraSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Carreras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carrera-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Carrera', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    $columns = [
        
        ['class' => 'yii\grid\SerialColumn'],
        // [
        //     'attribute' => 'id_carrera',
        //     'label' => ' ID Carrera ' // Cambia el nombre de la columna clave
        // ],
        'nombre',
        [
            'attribute' => 'clave',
            'label' => 'Clave de la Carrera' // Cambia el nombre de la columna clave
        ],
        'creditos',
        [
            'attribute' => 'cred_serv_social',
            'label' => 'Créditos Servicio Social', // Cambia el nombre de la columna cred_serv_social
        ],
        //'descripcion:ntext',
        //'carreracol',
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, Carrera $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id_carrera' => $model->id_carrera]);
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
                'heading'=>'<h3 class="panel-title"></i>  CARRERAS</h3>',
                'before' =>  '<div style="padding-top: 7px;"><em> Si desea generar un reporte, puede utilizar las opciones siguientes </em></div>',
                'after' => false
            ],
                // set a label for default menu
         
            'toolbar' =>  [ 
                ['content' => '{dynagrid}'],
                
                 ExportMenu::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => $columns,
                    'filename'=>'Reporte de Carrera',
                     
                    'contentBefore' => [
                        
                        ['value' => 'REPORTE DE CARRERA'],
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
