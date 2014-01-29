<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_lente'); ?>
		<?php echo $form->textField($model,'id_lente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_diseno'); ?>
		<?php echo $form->dropDownList($model,'id_diseno',$disenos); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_material'); ?>
		<?php echo $form->dropDownList($model,'id_material',$materiales); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->