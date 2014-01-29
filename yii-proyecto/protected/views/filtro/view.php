<?php
$this->breadcrumbs=array(
	'Filtros'=>array('index'),
	$model->id_filtro,
);

$this->menu=array(
        array('label'=>'Crear Filtro', 'url'=>array('create')),
	array('label'=>'Administrar Filtro', 'url'=>array('admin')),
    
);
?>

<h1>Ver Filtro #<?php echo $model->id_filtro; ?></h1>
       <?php 
        echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/cross.png', 'Eliminar').'Eliminar',array('delete','id'=>$model->id_filtro));
        ?>&nbsp;&nbsp;&nbsp;
        <?php 
        echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/pencil.png', 'Actualizar').'Actualizar',array('update','id'=>$model->id_filtro));
        ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_filtro',
		'nombre_filtro',
		'caracteristicas',
	),
)); ?>
