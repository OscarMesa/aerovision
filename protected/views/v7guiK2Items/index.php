<?php
$this->breadcrumbs=array(
	'V7gui K2 Items',
);

$this->menu=array(
	array('label'=>'Create V7guiK2Items','url'=>array('create')),
	array('label'=>'Manage V7guiK2Items','url'=>array('admin')),
);
?>

<h1>V7gui K2 Items</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
