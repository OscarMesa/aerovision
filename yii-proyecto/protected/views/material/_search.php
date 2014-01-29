<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_material'); ?>
		<?php echo $form->textField($model,'id_material'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_material'); ?>
		<?php echo $form->textField($model,'nombre_material',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'caracteristicas'); ?>
		<?php echo $form->textArea($model,'caracteristicas',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->