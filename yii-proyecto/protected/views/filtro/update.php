<?php
$this->breadcrumbs=array(
	'Filtros'=>array('index'),
	$model->id_filtro=>array('view','id'=>$model->id_filtro),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Filtros', 'url'=>array('index')),
	array('label'=>'Crear Filtro', 'url'=>array('create')),
	array('label'=>'Ver Filtro', 'url'=>array('view', 'id'=>$model->id_filtro)),
	array('label'=>'Administrar Filtro', 'url'=>array('admin')),
);
?>

<h1>Actualizar Filtro <?php echo $model->id_filtro; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>