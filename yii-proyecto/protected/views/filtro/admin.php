<?php
$this->breadcrumbs=array(
	'Filtros'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Crear Filtro', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('filtro-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Filtros</h1>
       <?php 
        echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/plus.png', 'Agregar').'Agregar',array('create'));
        ?>
<p>
Usted puede opcionalmente utilizar el operador de comparaci&oacute;n (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al comienzo de cada uno de sus valores de busqueda para especificar como debe ser hecha la busqueda</p>


<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'filtro-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id_filtro',
		'nombre_filtro',
		'caracteristicas',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
