<?php
$this->breadcrumbs=array(
	'Materiales'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Administrar Material', 'url'=>array('admin')),
);
?>

<h1>Crear Material</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>