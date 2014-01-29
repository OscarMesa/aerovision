<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_filtro'); ?>
		<?php echo $form->textField($model,'id_filtro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_filtro'); ?>
		<?php echo $form->textField($model,'nombre_filtro',array('size'=>32,'maxlength'=>32)); ?>
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