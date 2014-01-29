<?php
$this->breadcrumbs=array(
	'Actividades'=>array('index'),
	$model->id_actividad,
);

$this->menu=array(
	array('label'=>'Listar Actividades', 'url'=>array('index')),
	array('label'=>'Crear Actividad', 'url'=>array('create')),
	array('label'=>'Actualizar Actividad', 'url'=>array('update', 'id'=>$model->id_actividad)),
	array('label'=>'Eliminar Actividad', 'url'=>array('delete', 'id'=>$model->id_actividad), 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_actividad),'confirm'=>'Seguro que desea eliminarlo??')),
	array('label'=>'Administrar Actividades', 'url'=>array('admin')),
);
?>

<h1>Ver Actividad #<?php echo $model->id_actividad; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_actividad',
		'actividad',
		'precio_x_hora',
		'descripcion',
	),
)); ?>
