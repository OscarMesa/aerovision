
<div class="form">
<?php
$this->breadcrumbs=array(
	'Cotizacion'=>array('view','id'=>$_GET["id"]),
	'Agregar Filtro',
);
?>

    <h2>Agregar Filtro</h2>
    <?php
    Yii::app()->clientScript->registerScript(
       'myHideEffect',
       '$(".flash-success").animate({opacity: 1.0}, 6000).fadeOut("slow");',
       CClientScript::POS_READY
    );
?>

<?php foreach(Yii::app()->user->getFlashes() as $key => $message) {
    if ($key=='counters') {continue;}
    echo "<div class='flash-{$key}'>{$message}</div>";
} ?>
       
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
		<?php echo $form->hiddenField($model,'id_cotizacion',  array('value'=>$_GET["id"])); ?>
		<?php echo $form->error($model,'id_cotizacion'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::link('Volver', array('update', 'id'=>$_GET["id"], 'paso'=>5));?> <?php echo CHtml::submitButton('Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->