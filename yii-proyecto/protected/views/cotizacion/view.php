<?php
$this->breadcrumbs=array(
	'Cotizaciones'=>array('index'),
	$model->id_cotizacion,
);

$this->menu=array(
	array('label'=>'Crear Cotizacion', 'url'=>array('create')),
	array('label'=>'Eliminar Cotizacion', 'url'=>array('delete', 'id'=>$model->id_cotizacion), 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cotizacion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Cotizacion', 'url'=>array('admin')),
);
?>

<h1>Ver Cotizacion #<?php echo $model->id_cotizacion; ?></h1>
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
       
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_cotizacion',
		'nombre_completo',
		'edad',
		'telefono',
		'celular',
		'direccion',
		'ciudad',
		'departamento',
		'email',
                'esfera_ojo_izquierdo',
		'esfera_ojo_derecho',
		'cilindro_ojo_izquierdo',
		'cilindro_ojo_derecho',
		'eje_ojo_izquierdo',
		'eje_ojo_derecho',
		'adicion_izquierdo',
		'adicion_derecho',
		'distancia_pupilar',
	),
)); ?>
