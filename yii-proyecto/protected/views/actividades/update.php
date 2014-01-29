<?php
$this->breadcrumbs=array(
	'Actividades'=>array('index'),
	$model->id_actividad=>array('view','id'=>$model->id_actividad),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Actividades', 'url'=>array('index')),
	array('label'=>'Crear Actividad', 'url'=>array('create')),
	array('label'=>'Ver Actividad', 'url'=>array('view', 'id'=>$model->id_actividad)),
	array('label'=>'Administrar Actividad', 'url'=>array('admin')),
);
?>

<h1>Actualizar Actividades <?php echo $model->id_actividad; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>