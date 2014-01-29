<?php
$this->breadcrumbs=array(
	'Tasas'=>array('admin'),
);
?>

<h1>Ver Tasa</h1>
<h3><?php  echo $model->idMoneda0->nombre_moneda . " para la fecha " . $model->fecha; ?></h3>
<div class="buttons">
    <?php
      echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/plus.png', 'Agregar').'Agregar',array('create')); 
      echo ' ';
      echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/pencil.png', 'Modificar').'Modificar',array('update','id_moneda'=>$model->id_moneda,'fecha'=>$model->fecha,'id_sede'=>$model->id_sede)); 
      echo ' ';
      echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/user-business.png', 'Administrar').'Administrar', array('admin'));
   
    ?> 
</div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idMoneda0.nombre_moneda',
		'fecha',
		'venta',
		'compra',
		'idSede0.nombre_sede',
	),
)); ?>
