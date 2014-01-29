<?php
$this->breadcrumbs=array(
	'Tipos de lente'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Tipos de lente', 'url'=>array('index')),
	array('label'=>'Administrar Tipos de lente', 'url'=>array('admin')),
);
?>

<h1>Crear Tipos de lente</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>