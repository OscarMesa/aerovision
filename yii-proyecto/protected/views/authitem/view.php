<?php
$this->breadcrumbs=array(
	'Authitems'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar Authitems', 'url'=>array('index')),
	array('label'=>'Crear Authitem', 'url'=>array('create')),
	array('label'=>'Actualizar Authitem', 'url'=>array('update', 'id'=>$model->name)),
	array('label'=>'Administrar Authitems', 'url'=>array('admin')),
);
?>

<h1>Ver Authitem <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'type',
		'description',
		'bizrule',
		'data',
	),
)); ?>
