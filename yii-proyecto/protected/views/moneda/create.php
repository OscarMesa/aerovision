<?php
$this->breadcrumbs=array(
	'Monedas'=>array('admin'),
	'Crear',
);

?>

<h1>Crear Moneda</h1>
<div class="buttons">
    <?php
      echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/user-business.png', 'Administrar').'Administrar', array('admin'));
   
    ?> 
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>