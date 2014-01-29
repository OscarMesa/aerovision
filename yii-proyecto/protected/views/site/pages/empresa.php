<?php
$this->pageTitle=Yii::app()->name . ' - Caja de Pruebas';
$this->breadcrumbs=array(
	'Caja de Pruebas',
);
?>
<?php $this->pageTitle=Yii::app()->name; ?>
<h1>Servicio </h1>
<h2><?php CHtml::link('Cotizar Lentes', array('/cotizacion/create')); ?></h2>