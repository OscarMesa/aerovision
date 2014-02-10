<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'alias',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'catid',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'published',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'introtext',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'fulltext',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'video',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'gallery',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textAreaRow($model,'extra_fields',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'extra_fields_search',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'created',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'created_by',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'created_by_alias',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'checked_out',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'checked_out_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'modified',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'modified_by',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'publish_up',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'publish_down',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'trash',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'access',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ordering',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'featured',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'featured_ordering',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'image_caption',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'image_credits',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textAreaRow($model,'video_caption',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'video_credits',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'hits',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textAreaRow($model,'params',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'metadesc',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'metadata',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'metakey',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'plugins',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'language',array('class'=>'span5','maxlength'=>7)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
