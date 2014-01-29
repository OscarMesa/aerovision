<?php
$this->breadcrumbs=array(
	'Materiales',
);

$this->menu=array(
	array('label'=>'Crear Material', 'url'=>array('create')),
	array('label'=>'Administrar Materiales', 'url'=>array('admin')),
);
?>

<h1>Materiales</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
