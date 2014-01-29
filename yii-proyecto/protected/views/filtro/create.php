<?php
$this->breadcrumbs=array(
	'Filtros'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Filtro', 'url'=>array('index')),
	array('label'=>'Administrar Filtro', 'url'=>array('admin')),
);
?>

<h1>Crear Filtro</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>