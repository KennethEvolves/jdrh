<?php

use backend\models\Calificaciones;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

use kartik\editable\Editable;
use yii\widgets\ActiveForm;
use backend\models\Generaciones;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var backend\models\search\CalificacionesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Calificaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calificaciones-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-12">
            <?php
            // Aquí se incluye el formulario
            $form = ActiveForm::begin(['action' => ['create']]);
            echo $form->field($model, 'id_docente')->label('Docente')->dropDownList($model->DocentesPerfil, ['prompt' => 'Por Favor Elija Uno']);
            echo $form->field($model, 'id_unidad_estudio')->label('Unidad de estudio')->dropDownList(\yii\helpers\ArrayHelper::map(\backend\models\UnidadEstudio::find()->all(), 'id_unidad', 'nombre_asignatura'));
            echo $form->field($model, 'id_grado')->label('Grado')->dropDownList(\yii\helpers\ArrayHelper::map(\backend\models\Grado::find()->all(), 'id_grado', 'nombre'));
            echo $form->field($model, 'id_grupo')->label('Grupo')->dropDownList(\yii\helpers\ArrayHelper::map(\backend\models\Grupo::find()->all(), 'id_grupo', 'nombre'));
            echo $form->field($model, 'id_periodo_semestral')->label('Periodo')->dropDownList(\yii\helpers\ArrayHelper::map(\backend\models\PeriodoSemestral::find()->all(), 'id_ciclo', 'periodo'));
            echo $form->field($model, 'id_alumno')->label('Alumno')->dropDownList($model->AlumnoPerfil, ['prompt' => 'Por Favor Elija Uno']);
            // echo $form->field($model, 'calif_m1')->label('Calificacion momento 1')->textInput();
            // echo $form->field($model, 'calif_m2')->label('Calificacion momento 2')->textInput();
            // echo $form->field($model, 'promedio')->label('Promedio')->textInput();
            // echo $form->field($model, 'proyecto_integrador')->label('Proyecto integrador')->textInput();
            // echo $form->field($model, 'calif_final')->label('Calificacion Final')->textInput();
            // echo $form->field($model, 'porcentaje_asistencia')->label('Porcentaje de asistencia')->textInput();
            
            echo $form->field($model, 'id_generaciones')->label('Generación')->dropDownList(\yii\helpers\ArrayHelper::map(\backend\models\Generaciones::find()->all(), 'id_generacion', 'nombre'));   
            
            echo Html::submitButton('Save', ['class' => 'btn btn-success']);
            ActiveForm::end();
            ?>
        </div>
    </div>



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_calificacion',
            //'id_docente',
            
            [
                'attribute' => 'id_docente',
                'label' => 'Docente ', // Cambia el nombre de la columna clave
                'value' => function ($model) {
                    return $model->docente->perfil->nombre; // Ajusta 'nombre' según el atributo real en tu modelo Perfil
                },
            ],
            //'id_unidad_estudio',
            //'id_grado',
            //'id_grupo',
            [
                'attribute' => 'id_grupo',
                'label' => 'Grupo',
                'value' => 'grupo.nombre', // Cambia 'nombre' al nombre del atributo real en tu modelo Grupo
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'id_grupo',
                    \yii\helpers\ArrayHelper::map(\backend\models\Grupo::find()->all(), 'id_grupo', 'nombre'),
                    ['class' => 'form-control', 'prompt' => 'Todos']
                ),
            ],
            'id_periodo_semestral',
            //'id_alumno',
            [
                'attribute' => 'id_alumno',
                'label' => 'Alumno ', // Cambia el nombre de la columna clave
                'value' => function ($model) {
                    return $model->alumno->perfil->nombre; // Ajusta 'nombre' según el atributo real en tu modelo Perfil
                }
            ],
            //'calif_m1',
            [
                'attribute' => 'calif_m1',
                'format' => 'raw',
                'value' => function ($model) {
                    return Editable::widget([
                        'name' => 'calif_m1',
                        'value' => $model->calif_m1,
                        'asPopover' => true,
                        'header' => 'Calificación M1',
                        'size' => 'md',
                        'inputType' => Editable::INPUT_TEXT,
                        'options' => [
                            'class' => 'form-control',
                        ],
                        'submitOnEnter' => true,
                        'ajaxSettings' => [
                            'url' => Url::to(['calificaciones/editable', 'id_calificacion' => $model->id_calificacion]),
                        ],
                        'pluginEvents' => [
                            'editableSuccess' => 'function(event, val, form, data) {
                                if (data.success) {
                                    // Actualiza el valor en la interfaz de usuario
                                    $(this).text(data.value);
                    
                                } else {
                                    // Muestra un mensaje de error
                                    alert("Error al guardar en la base de datos");
                                }
                                
                            }',
                        ],
                    ]);
                },
            ],
            [
                'attribute' => 'calif_m2',
                'format' => 'raw',
                'value' => function ($model) {
                    return Editable::widget([
                        'name' => 'calif_m2',
                        'value' => $model->calif_m2,
                        'asPopover' => true,
                        'header' => 'Calificación M2',
                        'size' => 'md',
                        'inputType' => Editable::INPUT_TEXT,
                        'options' => [
                            'class' => 'form-control',
                        ],
                        'submitOnEnter' => true,
                        'ajaxSettings' => [
                            'url' => Url::to(['calificaciones/editable2', 'id_calificacion' => $model->id_calificacion]),
                        ],
                        'pluginEvents' => [
                            'editableSuccess' => 'function(event, val, form, data) {
                                if (data.success) {
                                    // Actualiza el valor en la interfaz de usuario
                                    $(this).text(data.value);
                                } else {
                                    // Muestra un mensaje de error
                                    alert("Error al guardar en la base de datos");
                                }
                            }',
                        ],
                    ]);
                },
            ],               

            //'promedio',
            [
                'attribute' => 'promedio',
                'format' => 'raw',
                'value' => function ($model) {
                    return Editable::widget([
                        'name' => 'promedio',
                        'value' => $model->promedio,
                        'asPopover' => true,
                        'header' => 'Promedio',
                        'size' => 'md',
                        'inputType' => Editable::INPUT_TEXT,
                        'options' => [
                            'class' => 'form-control',
                        ],
                        'submitOnEnter' => true,
                        'ajaxSettings' => [
                            'url' => Url::to(['calificaciones/editable3', 'id_calificacion' => $model->id_calificacion]),
                        ],
                        'pluginEvents' => [
                            'editableSuccess' => 'function(event, val, form, data) {
                                if (data.success) {
                                    // Actualiza el valor en la interfaz de usuario
                                    $(this).text(data.value);
                                } else {
                                    // Muestra un mensaje de error
                                    alert("Error al guardar en la base de datos");
                                }
                            }',
                        ],
                    ]);
                },
            ],
            //'proyecto_integrador',
            [
                'attribute' => 'proyecto_integrador',
                'format' => 'raw',
                'value' => function ($model) {
                    return Editable::widget([
                        'name' => 'proyecto_integrador',
                        'value' => $model->proyecto_integrador,
                        'asPopover' => true,
                        'header' => 'proyecto_integrador',
                        'size' => 'md',
                        'inputType' => Editable::INPUT_TEXT,
                        'options' => [
                            'class' => 'form-control',
                        ],
                        'submitOnEnter' => true,
                        'ajaxSettings' => [
                            'url' => Url::to(['calificaciones/editable4', 'id_calificacion' => $model->id_calificacion]),
                        ],
                        'pluginEvents' => [
                            'editableSuccess' => 'function(event, val, form, data) {
                                if (data.success) {
                                    // Actualiza el valor en la interfaz de usuario
                                    $(this).text(data.value);
                                } else {
                                    // Muestra un mensaje de error
                                    alert("Error al guardar en la base de datos");
                                }
                            }',
                        ],
                    ]);
                },
            ],
            //'calif_final',
            [
                'attribute' => 'calif_final',
                'format' => 'raw',
                'value' => function ($model) {
                    return Editable::widget([
                        'name' => 'calif_final',
                        'value' => $model->calif_final,
                        'asPopover' => true,
                        'header' => 'calif_final',
                        'size' => 'md',
                        'inputType' => Editable::INPUT_TEXT,
                        'options' => [
                            'class' => 'form-control',
                        ],
                        'submitOnEnter' => true,
                        'ajaxSettings' => [
                            'url' => Url::to(['calificaciones/editable5', 'id_calificacion' => $model->id_calificacion]),
                        ],
                        'pluginEvents' => [
                            'editableSuccess' => 'function(event, val, form, data) {
                                if (data.success) {
                                    // Actualiza el valor en la interfaz de usuario
                                    $(this).text(data.value);
                                } else {
                                    // Muestra un mensaje de error
                                    alert("Error al guardar en la base de datos");
                                }
                            }',
                        ],
                    ]);
                },
            ],
            //'porcentaje_asistencia',
            [
                'attribute' => 'porcentaje_asistencia',
                'format' => 'raw',
                'value' => function ($model) {
                    return Editable::widget([
                        'name' => 'porcentaje_asistencia',
                        'value' => $model->porcentaje_asistencia,
                        'asPopover' => true,
                        'header' => 'porcentaje_asistencia',
                        'size' => 'md',
                        'inputType' => Editable::INPUT_TEXT,
                        'options' => [
                            'class' => 'form-control',
                        ],
                        'submitOnEnter' => true,
                        'ajaxSettings' => [
                            'url' => Url::to(['calificaciones/editable6', 'id_calificacion' => $model->id_calificacion]),
                        ],
                        'pluginEvents' => [
                            'editableSuccess' => 'function(event, val, form, data) {
                                if (data.success) {
                                    // Actualiza el valor en la interfaz de usuario
                                    $(this).text(data.value);
                                } else {
                                    // Muestra un mensaje de error
                                    alert("Error al guardar en la base de datos");
                                }
                            }',
                        ],
                    ]);
                },
            ],
            [
                'attribute' => 'id_generaciones',
                'label' => 'Generación',
                'value' => function ($model) {
                    return $model->generaciones ? $model->generaciones->nombre : 'Sin generación';
                },
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'id_generaciones',
                    ArrayHelper::map(Generaciones::find()->all(), 'id_generacion', 'nombre'),
                    ['class' => 'form-control', 'prompt' => 'Todas']
                ),
            ],


            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Calificaciones $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_calificacion' => $model->id_calificacion]);
                 }
            ],
            
        ],
    ]); 
    
    
    
    
    ?>




</div>
