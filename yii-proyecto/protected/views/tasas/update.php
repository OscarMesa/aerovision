<?php
$this->breadcrumbs=array(
	'Tasas'=>array('admin'),
	'Actualizar',
);
?>

<h1>Actualizar tasa: </h1>
<h3><?php  echo $model->idMoneda0->nombre_moneda . " para la fecha " . $model->fecha; ?></h3>
<div class="buttons">
    <?php
      echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/plus.png', 'Agregar').'Agregar',array('create')); 
      echo ' ';
      echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/user-business.png', 'Administrar').'Administrar', array('admin'));
   
    ?> 
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model,'monedas'=>$monedas,'sedes'=>$sedes)); ?>