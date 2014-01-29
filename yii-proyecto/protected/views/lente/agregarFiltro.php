
<div class="form">
<?php
$this->breadcrumbs=array(
	'Lentes'=>array('index'),
	$_GET["id"]=> array('view','id'=>$_GET["id"]),
	'Agregar Filtro',
);
?>

    <h2>Agregar Filtro</h2>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'evento-agregarEvento-create-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
        

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
	<?php  ?>
	
		Filtro <br/>
		<?php echo $form->dropDownList($model,'id_filtro',  $filtros); ?>
		<?php echo $form->error($model,'id_filtro'); ?>
	</div>
	<div class="row">
		<?php echo $form->hiddenField($model,'id_lente',  array('value'=>$_GET["id"])); ?>
		<?php echo $form->error($model,'id_lente'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton('Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->