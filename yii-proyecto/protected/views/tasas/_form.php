<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'moneda-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>
        <div class="row">
		<?php echo $form->labelEx($model,'id_sede'); ?>
		<?php echo $form->dropDownList($model,'id_sede',$sedes); ?>
		<?php echo $form->error($model,'id_sede'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'id_moneda'); ?>
		<?php echo $form->dropDownList($model,'id_moneda',$monedas); ?>
		<?php echo $form->error($model,'id_moneda'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		 'name'=>'Tasas[fecha]',
                    'language'=>'es',
		'id'=>'Tasas_fecha',
			'model'=>$model,
			'attribute'=>'fecha',
			'value'=>$model->fecha,
		    // additional javascript options for the date picker plugin
		    'options'=>array(
		        'showAnim'=>'fold',
				"dateFormat"=>"yy-mm-dd",
		    ),
		    'htmlOptions'=>array(
		        'style'=>'height:20px;'
		    ),
		));
		// echo $form->textField($model,'fecha'); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'compra'); ?>
		<?php echo $form->textField($model,'compra'); ?>
		<?php echo $form->error($model,'compra'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'venta'); ?>
		<?php echo $form->textField($model,'venta'); ?>
		<?php echo $form->error($model,'venta'); ?>
	</div>
       
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->