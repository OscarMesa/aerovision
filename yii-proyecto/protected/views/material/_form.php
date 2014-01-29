<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'material-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_material'); ?>
		<?php echo $form->textField($model,'nombre_material',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'nombre_material'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'caracteristicas'); ?>
		<?php echo $form->textArea($model,'caracteristicas',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'caracteristicas'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->