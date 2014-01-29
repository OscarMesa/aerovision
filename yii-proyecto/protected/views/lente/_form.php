<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lente-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_diseno'); ?>
		<?php echo $form->dropDownList($model,'id_diseno', $disenos); ?>
		<?php echo $form->error($model,'id_diseno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_material'); ?>
		<?php echo $form->dropDownList($model,'id_material', $materiales); ?>
		<?php echo $form->error($model,'id_material'); ?>
	</div>

	<div class="row">

		<?php echo $form->hiddenField($model,'id_tipodelente', array("value"=>'7')); ?>

	</div>

 <table width="500" border="0" cellspacing="0" cellpadding="3">
  <tr>
    <td>&nbsp;</td>
    <td><b>Esfera</b></td>
    <td><b>Cilindro</b></td>

  </tr>
  <tr>
    <td ><b>Limite Inferior</b></td>
    <td><?php echo $form->textField($model,'esfera_limite_inferior'); ?><?php echo $form->error($model,'esfera_limite_inferior'); ?></td>
    <td><?php echo $form->textField($model,'cilindro_limite_inferior'); ?><?php echo $form->error($model,'cilindro_limite_inferior'); ?></td>
  </tr>
  <tr>
    <td><b>Limite Superior</b></td>
    <td><?php echo $form->textField($model,'esfera_limite_superior'); ?><?php echo $form->error($model,'esfera_limite_superior'); ?></td>
    <td><?php echo $form->textField($model,'cilindro_limite_superior'); ?><?php echo $form->error($model,'cilindro_limite_superior'); ?></td>
  </tr>
</table>       
 
        
            
        <div class="row">
		<?php echo $form->labelEx($model,'precio_terminado'); ?>
		<?php echo $form->textField($model,'precio_terminado'); ?> Solo introduzca numeros, no ingrese puntos ni comas
		<?php echo $form->error($model,'precio_terminado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precio_tallado'); ?>
		<?php echo $form->textField($model,'precio_tallado'); ?> Solo introduzca numeros, no ingrese puntos ni comas
		<?php echo $form->error($model,'precio_tallado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->