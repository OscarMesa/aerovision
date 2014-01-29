<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->nombre_completo,
);

$this->menu=array(
	array('label'=>'Listar Usuario', 'url'=>array('index')),
	array('label'=>'Crear Usuario', 'url'=>array('create')),
	array('label'=>'Actualizar Usuario', 'url'=>array('update', 'id'=>$model->id_usuario)),
	array('label'=>'Eliminar Usuario', 'url'=>array('delete', 'id'=>$model->id_usuario), 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_usuario),'confirm'=>'Seguro que desea eliminarlo?')),
	array('label'=>'Administrar Usuario', 'url'=>array('admin')),
);
?>

<h1>Ver Usuario <?php echo $model->nombre_completo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_usuario',
		'email',
		'nombre_completo',
	),
)); ?>

<h2>Roles</h2>
<?php echo CHtml::link('Asignar rol', 'index.php?r=authassignment/create&'. 'userid='.$model->id_usuario);?>
<?php 
//var_dump($roles);
$this->renderPartial('_roles',array(
	            	'roles'=>$roles,
	        	)); 
?>
