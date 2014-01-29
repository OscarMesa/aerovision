<?php
$this->breadcrumbs=array(
	'Lentes'=>array('index'),
	$model->id_lente,
);

$this->menu=array(
	array('label'=>'Listar Lente', 'url'=>array('index')),
	array('label'=>'Crear Lente', 'url'=>array('create')),
	array('label'=>'Eliminar Lente', 'url'=>array('delete'), 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_lente),'confirm'=>'Esta seguro que desea eliminarlo?')),
	array('label'=>'Administrar Lente', 'url'=>array('admin')),
);
?>

<h1>Ver Lente #<?php echo $model->id_lente; ?></h1>
<div id="caracteristicas">
    <b>Caracteristicas</b> <?php 
        echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/pencil.png', 'Editar').'Editar',array('update','id'=>$model->id_lente));
        ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_lente',
		'idDiseno0.nombre_diseno',
		'idMaterial0.nombre_material',
		'esfera_limite_inferior',
		'esfera_limite_superior',
                'cilindro_limite_inferior',
		'cilindro_limite_superior',
                'precio_terminado',
		'precio_tallado',
	),
)); ?>
</div>
	<div id="filtros">
<b>Filtros</b>
         
        <?php 
        echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/plus.png', 'Agregar').'Agregar',array('agregarFiltro','id'=>$model->id_lente));
        ?>
    
        <?php 

               $this->widget('zii.widgets.grid.CGridView', array(
                'dataProvider'=>$filtrosXLente,
                'hideHeader'=>true,
                'summaryText'=>"",
                'columns'=>array(
                        array(
                           'name'=>'id_filtro',
                            'value'=>'$data->idFiltro0->nombre_filtro',
                            'header'=>"Filtros",
                        ),
                         array(            // display a column with "view", "update" and "delete" buttons
                            'class'=>'CButtonColumn',
                             'header'=>'Acciones',
                            'template'=>'{delete}',
                             'deleteConfirmation'=>'Esta seguro que desea elimnar el filtro?',
                            'buttons'=>array(
                                'delete'=>array(
                                    'label'=>'Eliminar filtro',
                                    'imageUrl'=>Yii::app()->theme->baseUrl.'/images/icons/cross.png',
                                    'url'=>'Yii::app()->createUrl("lente/eliminarFiltro",array("id_lente"=>$_GET["id"], "id_filtro"=>$data->id_filtro))',
                                    )
                                ),
                             ),
                    ),

        )); ?>
        </div>