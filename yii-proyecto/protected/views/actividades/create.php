<?php
$this->breadcrumbs=array(
	'Actividades'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Actividades', 'url'=>array('index')),
	array('label'=>'Administrar Actividades', 'url'=>array('admin')),
);
?>

<h1>Crear Actividades</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>