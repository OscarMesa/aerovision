<?php
$this->breadcrumbs=array(
	'Monedas'=>array('admin'),
	$model->id_moneda=>array('view','id'=>$model->id_moneda),
	'Actualizar',
);


?>

<h1>Actualizar Moneda <?php echo $model->id_moneda; ?></h1>
<div class="buttons">
    <?php
      echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/plus.png', 'Agregar').'Agregar',array('create')); 
      echo ' ';
      echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/user-business.png', 'Administrar').'Administrar', array('admin'));
   
    ?> 
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>