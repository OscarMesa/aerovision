<?php
$this->breadcrumbs=array(
	'Sedes'=>array('admin'),
	'Administrar',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('sede-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Sedes</h1>
<div class="buttons">
    <?php

      echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/plus.png', 'Agregar').'Agregar',array('create')); 
      echo ' ';
    ?> 
</div>
<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sede-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id_sede',
		'nombre_sede',
		'ciudad',
		'descripcion',
		'direccion',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
