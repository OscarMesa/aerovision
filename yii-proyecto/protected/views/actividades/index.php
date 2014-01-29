<?php
$this->breadcrumbs=array(
	'Actividades',
);

$this->menu=array(
	array('label'=>'Crear Actividad', 'url'=>array('create')),
	array('label'=>'Administrar Actividades', 'url'=>array('admin')),
);
?>

<h1>Actividades</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
