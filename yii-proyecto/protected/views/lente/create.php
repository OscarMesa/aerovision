<?php
$this->breadcrumbs=array(
	'Lentes'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Lentes', 'url'=>array('index')),
	array('label'=>'Administrar Lentes', 'url'=>array('admin')),
);
?>

<h1>Crear Lente</h1>
Para agregar <b>filtros</b> primero debe guardar las siguientes configuraciones del Lente
<?php echo $this->renderPartial('_form', array('model'=>$model, 'disenos'=>$disenos, 'materiales'=>$materiales, 'tiposDeLentes'=>$tiposDeLentes)); ?>