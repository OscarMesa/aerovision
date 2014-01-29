<?php
$this->breadcrumbs=array(
	'Materiales'=>array('index'),
	$model->id_material=>array('view','id'=>$model->id_material),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Crear Material', 'url'=>array('create')),
	array('label'=>'Ver Material', 'url'=>array('view', 'id'=>$model->id_material)),
	array('label'=>'Administrar Materiales', 'url'=>array('admin')),
);
?>

<h1>Actualizar Material <?php echo $model->id_material; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>