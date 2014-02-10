<?php
$this->breadcrumbs=array(
	'V7gui K2 Items'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List V7guiK2Items','url'=>array('index')),
	array('label'=>'Manage V7guiK2Items','url'=>array('admin')),
);
?>

<h1>Create V7guiK2Items</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>