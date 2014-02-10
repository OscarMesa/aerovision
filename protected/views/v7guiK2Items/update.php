<?php
$this->breadcrumbs=array(
	'V7gui K2 Items'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
        array('label'=>'Inicio','url'=>Yii::app()->baseUrl),
	array('label'=>'Listar','url'=>Yii::app()->createUrl('programa/view', array('id'=>$model->id))),
);
?>

<h3>Programa <?php echo $model->title; ?></h3>

<?php echo $this->renderPartial('application.views.v7guiK2Items._form',array('model'=>$model)); ?>