<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuarioxlaboratorio-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
	<?php  $data= CHtml::listData(Authitem::model()->findAll('type=:type',array(':type'=>'2')), 'name', 'name'); ?>
	
		<?php echo $form->labelEx($model,'itemname'); ?>
		<?php echo $form->dropDownList($model,'itemname',  $data); ?>
		<?php echo $form->error($model,'itemname'); ?>
	</div>

	<div class="row">
		<?php $data= Usuario::model()->findByPk($_GET["userid"]);?>
		<?php echo $form->labelEx($model,'userid'); ?>
		<?php echo CHtml::hiddenField('Authassignment[userid]',  $data->id_usuario); ?>
		<?php 
			echo $data->nombre_completo;
		  ?>
		
		<?php echo $form->error($model,'id_laboratorio'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Asignar' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->