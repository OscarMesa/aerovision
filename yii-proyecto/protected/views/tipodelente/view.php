<?php
$this->breadcrumbs=array(
	'Tipodelentes'=>array('index'),
	$model->id_tipodelente,
);

$this->menu=array(
	array('label'=>'Listar Tipos de lente', 'url'=>array('index')),
	array('label'=>'Crear Tipos de lente', 'url'=>array('create')),
	array('label'=>'Actualziar Tipos de lente', 'url'=>array('update', 'id'=>$model->id_tipodelente)),
	array('label'=>'Eliminar Tipos de lente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipodelente),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Tipos de lente', 'url'=>array('admin')),
);
?>

<h1>Ver Tipos de lentes #<?php echo $model->id_tipodelente; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_tipodelente',
		'nombre_tipodelente',
		'caracteristicas',
	),
)); ?>
