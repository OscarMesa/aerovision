<?php
$this->breadcrumbs=array(
	'Diseños'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Administrar Diseño', 'url'=>array('admin')),
);
?>

<h1>Crear Dise&ntilde;o</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'tiposDeDiseno'=>$tiposDeDiseno)); ?>