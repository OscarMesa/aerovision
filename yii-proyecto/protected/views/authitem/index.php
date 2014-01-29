<?php
$this->breadcrumbs=array(
	'Authitems',
);

$this->menu=array(
	array('label'=>'Crear Authitem', 'url'=>array('create')),
	array('label'=>'Administrar Authitems', 'url'=>array('admin')),
);
?>

<h1>Authitems</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
