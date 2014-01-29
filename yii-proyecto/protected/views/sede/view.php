<?php
$this->breadcrumbs=array(
	'Sedes'=>array('admin'),
	$model->id_sede,
);
?>

<h1>Ver Sede <?php echo $model->nombre_sede; ?></h1>
<div class="buttons">
    <?php
      echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/plus.png', 'Agregar').'Agregar',array('create')); 
      echo ' ';
      echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/pencil.png', 'Modificar').'Modificar',array('update','id'=>$model->id_sede)); 
      echo ' ';
      echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/user-business.png', 'Administrar').'Administrar', array('admin'));
   
    ?> 
</div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_sede',
		'nombre_sede',
		'ciudad',
		'descripcion',
		'direccion',
	),
)); ?>
