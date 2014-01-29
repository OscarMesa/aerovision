<?php
$this->breadcrumbs=array(
	'Diseños',
);

$this->menu=array(
	array('label'=>'Crear Diseño', 'url'=>array('create')),
	array('label'=>'Administrar Diseño', 'url'=>array('admin')),
);
?>

<h1>Dise&ntilde;os</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
