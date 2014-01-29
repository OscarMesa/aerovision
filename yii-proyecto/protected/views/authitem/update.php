<?php
$this->breadcrumbs=array(
	'Authitems'=>array('index'),
	$model->name=>array('view','id'=>$model->name),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Authitems', 'url'=>array('index')),
	array('label'=>'Crear Authitem', 'url'=>array('create')),
	array('label'=>'Ver Authitem', 'url'=>array('view', 'id'=>$model->name)),
	array('label'=>'Administrar Authitems', 'url'=>array('admin')),
);
?>

<h1>Actualizar Authitem <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>