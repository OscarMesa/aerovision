<?php
$this->breadcrumbs=array(
	'Tipos de lente',
);

$this->menu=array(
	array('label'=>'Crear Tipos de lente', 'url'=>array('create')),
	array('label'=>'Administrar Tipos de lente', 'url'=>array('admin')),
);
?>

<h1>Tipos de lentes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
