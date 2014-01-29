<?php
$this->breadcrumbs=array(
	'Authitems'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Roles', 'url'=>array('index')),
	array('label'=>'Crear Rol', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('authitem-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Authitems</h1>

<p>
Usted puede opcionalmente utilizar el operador de comparaci&oacute;n (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al comienzo de cada uno de sus valores de busqueda para especificar como debe ser hecha la busqueda</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'authitem-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'name',
		'type',
		'description',
		'bizrule',
		'data',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
