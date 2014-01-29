<?php
$this->breadcrumbs=array(
	'Diseños'=>array('index'),
	$model->id_diseno=>array('view','id'=>$model->id_diseno),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Diseño', 'url'=>array('index')),
	array('label'=>'Crear Diseño', 'url'=>array('create')),
	array('label'=>'Ver Diseño', 'url'=>array('view', 'id'=>$model->id_diseno)),
	array('label'=>'Administrar Diseño', 'url'=>array('admin')),
);
?>

<h1>Actualizar Diseno <?php echo $model->id_diseno; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'tiposDeDiseno'=>$tiposDeDiseno)); ?>