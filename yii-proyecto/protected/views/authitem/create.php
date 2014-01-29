<?php
$this->breadcrumbs=array(
	'Authitems'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Roles', 'url'=>array('index')),
	array('label'=>'Administrar Roles', 'url'=>array('admin')),
);
?>

<h1>Crear Authitems</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>