<?php
$this->breadcrumbs=array(
	'Tasas'=>array('admin'),
	'Administrar',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('moneda-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Tasas</h1>
<div class="buttons">
    <?php

      echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/plus.png', 'Agregar').'Agregar',array('create')); 
      echo ' ';
    ?> 
</div>
<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'moneda-grid',
	'dataProvider'=>$model->search(),
        
	'columns'=>array(
		'idMoneda0.nombre_moneda',
		'compra',
		'venta',
                'idSede0.nombre_sede',
                'fecha',
		array(
			'class'=>'CButtonColumn',
                        'header'=>'Editar',
                        'template'=>'{update}',
                        'deleteConfirmation'=>'Esta seguro que desea eliminarla?',
                        'buttons'=>array(
                        'update'=>array(
                            'label'=>'Editar',
                            'imageUrl'=>Yii::app()->theme->baseUrl.'/images/icons/pencil.png',
                            'url'=>'Yii::app()->createUrl("tasas/update",array("id_moneda"=>$data->id_moneda,"fecha"=>$data->fecha,"id_sede"=>$data->id_sede))',
                            ),
                        'delete'=>array(
                            'label'=>'Eliminar',
                            'imageUrl'=>Yii::app()->theme->baseUrl.'/images/icons/cross.png',
                            'url'=>'Yii::app()->createUrl("tasas/delete",array("id_moneda"=>$data->id_moneda,"fecha"=>$data->fecha,"id_sede"=>$data->id_sede))',
                            )
                        ),
		),
	),
)); ?>
