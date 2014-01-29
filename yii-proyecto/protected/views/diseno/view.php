<?php
$this->breadcrumbs=array(
	'Disenos'=>array('index'),
	$model->id_diseno,
);

$this->menu=array(
	array('label'=>'Crear Diseño', 'url'=>array('create')),
	array('label'=>'Actualizar Diseño', 'url'=>array('update', 'id'=>$model->id_diseno)),
	array('label'=>'Eliminar Diseño', 'url'=>array('delete', 'id'=>$model->id_diseno), 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_diseno),'confirm'=>'Esta seguro que desea eliminarlo?')),
	array('label'=>'Administrar Diseño', 'url'=>array('admin')),
);
?>

<h1>Ver Diseno #<?php echo $model->id_diseno; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_diseno',
		'nombre_diseno',
		'caracteristicas',
	),
)); ?>
