<?php
$this->breadcrumbs=array(
	'V7gui K2 Items'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List V7guiK2Items','url'=>array('index')),
	array('label'=>'Create V7guiK2Items','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('v7gui-k2-items-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage V7gui K2 Items</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'v7gui-k2-items-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'alias',
		'catid',
		'published',
		'introtext',
		/*
		'fulltext',
		'video',
		'gallery',
		'extra_fields',
		'extra_fields_search',
		'created',
		'created_by',
		'created_by_alias',
		'checked_out',
		'checked_out_time',
		'modified',
		'modified_by',
		'publish_up',
		'publish_down',
		'trash',
		'access',
		'ordering',
		'featured',
		'featured_ordering',
		'image_caption',
		'image_credits',
		'video_caption',
		'video_credits',
		'hits',
		'params',
		'metadesc',
		'metadata',
		'metakey',
		'plugins',
		'language',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
