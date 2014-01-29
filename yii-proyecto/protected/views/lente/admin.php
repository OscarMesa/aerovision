<?php
$this->breadcrumbs=array(
	'Lentes'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Crear Lente', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('lente-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Lentes</h1>
       <?php 
        echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/plus.png', 'Agregar').'Agregar',array('create'));
        ?>
<p>
Usted puede opcionalmente utilizar el operador de comparaci&oacute;n (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al comienzo de cada uno de sus valores de busqueda para especificar como debe ser hecha la busqueda</p>


<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
        'materiales'=>$materiales,
        'tiposDeLentes'=>$tiposDeLentes,
        'disenos'=>$disenos,
)); ?>
</div><!-- search-form -->

<?php 
function imprimir($filtros){
    $retorno = "";
    foreach($filtros as $filtro){
        $retorno .= $filtro->nombre_filtro. " - ";
    }
    return $retorno;
}
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'lente-grid',
	'dataProvider'=>$model->search(),  
	'columns'=>array(
                'id_lente',
		'idDiseno0.nombre_diseno',
		'idMaterial0.nombre_material',

                array('name'=>'filtros.nombre_filtro', 
                        'value'=>'imprimir($data->filtros)',
                    ),
 		array('name'=>'precio_terminado', 
                        'value'=>'number_format($data->precio_terminado)',
                    ),
                array('name'=>'precio_tallado', 
                        'value'=>'number_format($data->precio_tallado)',
                    ),           
            /*
		'esfera_limite_inferior',
		
		'esfera_limite_superior',
		'cilindro_limite_superior',
		'cilindro_limite_inferior',
		'precio_tallado',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
