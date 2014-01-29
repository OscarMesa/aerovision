<?php
$this->breadcrumbs=array(
	'Monedas'=>array('admin'),
	$model->id_moneda,
);

?>

<h1>Ver Moneda: <?php echo $model->nombre_moneda; ?></h1>
<div class="buttons">
    <?php
      echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/plus.png', 'Agregar').'Agregar',array('create')); 
      echo ' ';
      echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/pencil.png', 'Modificar').'Modificar',array('update','id'=>$model->id_moneda)); 
      echo ' ';
      echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/user-business.png', 'Administrar').'Administrar', array('admin'));
   
    ?> 
</div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_moneda',
		'nombre_moneda',
		'descripcion',
		'estado',
                'id_articulo'
	),
)); ?>
         
