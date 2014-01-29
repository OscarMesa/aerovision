<?php
$this->breadcrumbs=array(
	'Lentes'=>array('index'),
	$model->id_lente=>array('view','id'=>$model->id_lente),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Lentes', 'url'=>array('index')),
	array('label'=>'Crear Lente', 'url'=>array('create')),
	array('label'=>'Ver Lente', 'url'=>array('view', 'id'=>$model->id_lente)),
	array('label'=>'Administrar Lente', 'url'=>array('admin')),
);
?>

<h1>Actualizar Lente <?php echo $model->id_lente; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'disenos'=>$disenos, 'tiposDeLentes'=>$tiposDeLentes, 'materiales'=>$materiales)); ?>