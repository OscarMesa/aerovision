<?php
$this->breadcrumbs=array(
	'Cotizaciones'=>array('index'),
	$model->id_cotizacion=>array('view','id'=>$model->id_cotizacion),
	'Actualizar',
);

$this->menu=array(

	array('label'=>'Crear Cotizacion', 'url'=>array('create')),
	array('label'=>'Ver Cotizacion', 'url'=>array('view', 'id'=>$model->id_cotizacion)),
	array('label'=>'Administrar Cotizacion', 'url'=>array('admin')),
);
?>

<h1>Actualizar Cotizacion <?php echo $model->id_cotizacion; ?></h1>
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
       
<?php echo $this->renderPartial('_form', array('model'=>$model,'disenos'=>$disenos,'materiales'=>$materiales,'cotizacionFiltros'=>$cotizacionFiltros,'tiposDeDiseno'=>$tiposDeDiseno)); ?>