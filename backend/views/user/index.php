<?php
 
use yii\helpers\Html;
use yii\grid\GridView;
use \yii\bootstrap5\Accordion;
use kartik\dynagrid\DynaGrid;
use kartik\export\ExportMenu;
use kartik\bs5dropdown\ButtonDropdown;
use kartik\mpdf\pdf;
use yii\helpers\ArrayHelper;
use kartik\icons\Icon;
Icon::map($this); 
 
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
 
$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
 
    <h1><?= Html::encode($this->title = 'FILTRADO DE USUARIOS') ?></h1>
    
     <?php  // echo Collapse::widget(['items' => [
                                            // equivalente a lo de arriba
                                           //  [
                                           //     'label' => 'Search',
                                            //    'content' => $this->render('_search', ['model' => $searchModel]) ,
                                                // open its content by default
                                                //'contentOptions' => ['class' => 'in']
                                           // ],
                                            
                                    //] 
                                   // ]);  
    ?> 

   
    <?php  echo Accordion::widget([
                            'items' => [
                                // equivalent to the above
                                [
                                    'label' => 'Usuario a Buscar ',
                                    'content' => $this->render('_search', ['model' => $searchModel]) ,
                                    // open its content by default
                                    'contentOptions' => ['class' => 'in']
                                ],
                                   // if you want to swap out .card-block with .list-group, you may use the following
                            ]
                        ]);
    ?> 
    
    <p> </p>
    
    <?php 
    // Define las columnas
    
    $columns = [
        
        ['class' => 'yii\grid\SerialColumn'],
        // ['attribute' => 'userIdLink', 'format' => 'raw'],
        ['attribute' => 'userLink', 'format' => 'raw'],
        ['attribute' => 'perfilLink', 'format' => 'raw'],
        'email:email',
        'rolNombre',
        'tipoUsuarioNombre',
        'estadoNombre',
        'created_at',
        ['class' => 'yii\grid\ActionColumn'],

        
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
            'heading'=>'<h3 class="panel-title"></i>  USUARIOS</h3>',
            'before' =>  '<div style="padding-top: 7px;"><em> Si desea generar un reporte, puede utilizar las opciones siguientes </em></div>',
            'after' => false
        ],
            // set a label for default menu
     
        'toolbar' =>  [ 
            ['content' => '{dynagrid}'],
            
             ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $columns,
                'filename'=>'Reporte de usuarios',
                 
                'contentBefore' => [
                    
                    ['value' => 'REPORTE DE USUARIOS'],
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