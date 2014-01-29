<?php
$this->breadcrumbs=array(
	'Cotizaciones'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Crear Cotizacion', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cotizacion-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Cotizaciones</h1>
<?php
    Yii::app()->clientScript->registerScript(
       'myHideEffect',
       '$(".flash-success").animate({opacity: 1.0}, 6000).fadeOut("slow");',
       CClientScript::POS_READY
    );
?>

<?php foreach(Yii::app()->user->getFlashes() as $key => $message) {
    if ($key=='counters') {continue;}
    echo "<div class='flash-{$key}'>{$message}</div>";
} ?>
       
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
	'id'=>'cotizacion-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id_cotizacion',
		'nombre_completo',
		'edad',
		'telefono',
		'celular',
		'direccion',
		/*
		'ciudad',
		'departamento',
		'email',
		'esfera_ojo_derecho',
		'esfera_ojo_izquierdo',
		'cilindro_ojo_derecho',
		'cilindro_ojo_izquierdo',
		'eje_ojo_izquierdo',
		'eje_ojo_derecho',
		'adicion_derecho',
		'adicion_izquierdo',
		'distancia_pupilar',
		'lente',
		'estado',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
