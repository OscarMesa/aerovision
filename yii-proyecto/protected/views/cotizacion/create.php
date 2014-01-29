<?php
$this->breadcrumbs=array(
	'Cotizaciones'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Administrar Cotizaciones', 'url'=>array('admin')),
);
?>

<h1>Crear Cotizacion</h1>
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
       
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>