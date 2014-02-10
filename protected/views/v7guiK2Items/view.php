<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well',"enctype"=>"multipart/form-data"),
)); ?>

<?php echo $form->errorSummary($model); ?>

<?php
$this->menu=array(
        array('label'=>'Inicio','url'=>Yii::app()->baseUrl),
	array('label'=>'Modificar','url'=>Yii::app()->createUrl('programa/edit', array('id'=>$model->id))),
);
?>

<h3> Progama <?php echo $model->title; ?></h3>


<?php 
Yii::import('application.vendor.Utilidades');
$this->widget('bootstrap.widgets.TbDetailView',array(
        'type'=>'bordered condensed',
	'data'=>$model,
	'attributes'=>array(
		'title',
		array('type'=>'raw', 'label' =>  $model->getNameAtribute('catid'),'value'=>  $model->category->name),
		'created',
                'modified',
                'publish_down',
            	'introtext:html',
		'fulltext:html',
                array('type'=>'raw', 'label' =>  $model->getNameAtribute('fileUpload'),'value'=> Utilidades::popDropBox($model->getAdjuntosAppYii()),
	),
))); ?>


<?php $this->endWidget(); ?>
