<?php
$this->breadcrumbs=array(
	'Materials'=>array('index'),
	$model->id_material,
);

$this->menu=array(
	array('label'=>'Crear Material', 'url'=>array('create')),
	array('label'=>'Actualizar Material', 'url'=>array('update', 'id'=>$model->id_material)),
	array('label'=>'Eliminar Material', 'url'=>array('delete', 'id'=>$model->id_material), 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_material),'confirm'=>'Esta seguro que desea eliminarlo?')),
	array('label'=>'Administrar Materiales', 'url'=>array('admin')),
);
?>

<h1>Ver Material #<?php echo $model->id_material; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_material',
		'nombre_material',
		'caracteristicas',
	),
)); ?>
