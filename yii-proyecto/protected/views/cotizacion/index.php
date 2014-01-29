<?php
$this->breadcrumbs=array(
	'Cotizaciones',
);

$this->menu=array(
	array('label'=>'Crear Cotizacion', 'url'=>array('create')),
	array('label'=>'Administrar Cotizacion', 'url'=>array('admin')),
);
?>

<h1>Cotizaciones</h1>
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
       
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
