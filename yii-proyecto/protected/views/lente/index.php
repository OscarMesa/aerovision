<?php
$this->breadcrumbs=array(
	'Lentes',
);

$this->menu=array(
	array('label'=>'Crear Lente', 'url'=>array('create')),
	array('label'=>'Administrar Lente', 'url'=>array('admin')),
);
?>

<h1>Lentes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
