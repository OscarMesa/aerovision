<?php
$this->breadcrumbs=array(
	'Filtros',
);

$this->menu=array(
	array('label'=>'Crear Filtro', 'url'=>array('create')),
	array('label'=>'Administrar Filtro', 'url'=>array('admin')),
);
?>

<h1>Filtros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
