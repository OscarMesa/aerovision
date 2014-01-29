<?php
$this->breadcrumbs=array(
	'Sedes'=>array('admin'),
	$model->id_sede=>array('view','id'=>$model->id_sede),
	'Actualizar',
);

?>

<h1>Actualizar Sede: <?php echo $model->nombre_sede; ?></h1>
<div class="buttons">
    <?php
      echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/plus.png', 'Agregar').'Agregar',array('create')); 
      echo ' ';
      echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/user-business.png', 'Administrar').'Administrar', array('admin'));
   
    ?> 
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>