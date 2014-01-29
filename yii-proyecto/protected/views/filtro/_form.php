<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'filtro-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_filtro'); ?>
		<?php echo $form->textField($model,'nombre_filtro',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'nombre_filtro'); ?>
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