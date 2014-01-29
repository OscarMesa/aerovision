<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'moneda-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data') 
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_moneda'); ?>
		<?php echo $form->textField($model,'nombre_moneda',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'nombre_moneda'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->textField($model,'estado'); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'id_articulo'); ?>
		<?php echo $form->textField($model,'id_articulo'); ?>
		<?php echo $form->error($model,'id_articulo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->