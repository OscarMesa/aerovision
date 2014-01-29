<?php
$this->breadcrumbs=array(
	'Diseños'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Crear Diseño', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('diseno-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Dise&ntilde;os</h1>
       <?php 
        echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/plus.png', 'Agregar').'Agregar',array('create'));
        ?> <br/><br/>
<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'diseno-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id_diseno',
                'idTipoDiseno0.nombre_tipo_diseno',
		'nombre_diseno',
		'caracteristicas',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
