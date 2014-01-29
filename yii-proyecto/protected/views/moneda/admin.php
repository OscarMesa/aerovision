<?php
$this->breadcrumbs=array(
	'Monedas'=>array('admin'),
	'Administrar',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('moneda-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Monedas</h1>
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
	'id'=>'moneda-grid',
	'dataProvider'=>$model->search(),
        
	'columns'=>array(
		'id_moneda',
		'nombre_moneda',
		'descripcion',
		'estado',
                'id_articulo',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
