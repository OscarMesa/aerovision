<?php
    Yii::import('application.vendor.*');
    Yii::import("application.models.appjoomla.*", true);
    $criteria = new CDbCriteria();
    $criteria->alias = 'item';
    $criteria->with = array(
        'arch_adjuntos' => array(
            'alias' => 'a_adj',
        ),
        'category' => array(
            'aliar' => 'cat',
        ),
    );
    $criteria->addInCondition('item.catid', V7guiK2Categories::buscarTodasCategorias(3));
    //$criteria->params = array('3');
    $dataProvider = new CActiveDataProvider('V7guiK2Items', array(
        'criteria' => $criteria,
        'pagination' => array(
                'pageSize' => 20,
         )
            )
    );
    
?>

<?php

$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'type' => 'primary',
        // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'htmlOptions' => array(
            'id' => 'rangos-fechas',
        ),
        'buttons' => array(
            array('label' => 'Filtro:', 'url' => '#',),
            array(
                'items' => array(
                    array('label' =>'Según Ultima actualización',),
                    array('label' => 'Hace menos de 1 mes', 'url' => '#act,1',),
                    array('label' => 'Entre 1 y 2 meses', 'url' => '#act,2'),
                    array('label' => 'Entre 2 y 4 meses', 'url' => '#act,3', ),
                    array('label' => 'Entre 4  y 8 meses', 'url' => '#act,4'),
                    array('label' => 'Entre 8 meses y 12 meses', 'url' => '#act,5'),
                    array('label' => 'Hace mas de un año', 'url' => '#act,6'),
                    
                    array('label' => 'Según fecha de finalización de publicación'),
                    array('label' => 'Sin fecha de finalización', 'url' => '#fin,1' ),
                    array('label' => 'Fecha de finalización vencida', 'url' => '#fin,2'),
                    array('label' => 'Proximos a vencerse (1 mes)', 'url' => '#fin,3'),
                    array('label' => 'Proximos a vencerse (2 meses)', 'url' => '#fin,4'),
                    array('label' => 'Vencidos hace menos de 1 mes', 'url' => '#fin,5'),
                    array('label' => 'Vencidos entre 1 y 3 meses', 'url' => '#fin,6'),
                    array('label' => 'Vencidos entre 3 y 6 meses', 'url' => '#fin,7'),
                    array('label' => 'Vencidos entre 6 y 12 meses', 'url' => '#fin,8'),
                    array('label' => 'Vencidos hace mas de un año ', 'url' => '#fin,9'),
                    
                )
            ),
        ),
        
    )
);

?>
<div id="grid-lista-programas">
<?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'lista-programas',
        'dataProvider' => $dataProvider,
        //'filter' => V7guiK2Items::model(),
        'type' => 'striped bordered condensed', 
        'columns' => array(
            'title',
            'created',
            'modified',
            'publish_down',
            array(
                'type' => 'raw',
                'header'=> 'Adjuntos',
                'value' => 'Utilidades::popDropBox($data->arch_adjuntos)'
                ),
            array(
                'type' => 'raw',
                'header'=> 'Adjuntar archivo',
                'value' => 'Utilidades::generarLink($data->id)'
                ),
            ),
        )
       );
       
?>
</div>
<?php    
    

  
?>


<script type="text/javascript">

$(document).on('ready',function(){
   $('#rangos-fechas .dropdown-menu a').each(function(index,element)
   {
      $(element).attr('onclick','cargarFiltro($(this))'); 
   });
});



function cargarFiltro(e)
{
    $.ajax({
        type:'post',
        data:'data='+ e.attr('href').split(','),
        url:'<?php echo Yii::app()->createUrl('usuario/FiltroProgramasXFechas')?>',
        success:function(r){
            $('#grid-lista-programas').html(r);
        },
        error:function(r){
            console.log(r);
        }
    });
    //return false;
}
</script>