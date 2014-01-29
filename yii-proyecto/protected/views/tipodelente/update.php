<?php
$this->breadcrumbs=array(
	'Tipodelentes'=>array('index'),
	$model->id_tipodelente=>array('view','id'=>$model->id_tipodelente),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Tipo de lente', 'url'=>array('index')),
	array('label'=>'Crear Tipos de lente', 'url'=>array('create')),
	array('label'=>'Ver Tipos de lente', 'url'=>array('view', 'id'=>$model->id_tipodelente)),
	array('label'=>'Administrar Tipos de lente', 'url'=>array('admin')),
);
?>

<h1>Actualizar Tipo de lente <?php echo $model->id_tipodelente; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>