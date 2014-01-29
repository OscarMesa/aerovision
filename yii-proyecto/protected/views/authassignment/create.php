<?php
$authasignments= Authassignment::model()->findAll();

$this->breadcrumbs=array(
	'usuarios'=>array('/usuario'),
	$_GET["userid"]=>array('/usuario/view&id='.$_GET["userid"]),
	'Asignar Authasignment a Usuario',
);


$this->menu=array(
	array('label'=>'Volver a usuario', 'url'=>array('/usuario/view&id='.$_GET["userid"])),
);
?>

<h1>Asignar Authasignment a Usuario</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>