<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_completo'); ?>
		<?php echo $form->textField($model,'nombre_completo',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'nombre_completo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contrasena'); ?>
		<?php echo $form->passwordField($model,'contrasena',array('size'=>60,'maxlength'=>128, 'value'=>"")); ?>
		<?php echo $form->error($model,'contrasena'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->