<?php $this->widget('bootstrap.widgets.TbTabs', array(
        'id' => 'mytabs',
        'type' => 'tabs',
        'tabs' => array(
                array('id' => 'tab1', 'label' => 'Programas', 'content' => $this->renderPartial('application.views.programa.programas_publicados', null, true), 'active' => true,),
                array('id' => 'tab2', 'label' => 'Tab 2', 'content' => 'loading ....',),
                array('id' => 'tab3', 'label' => 'Tab 3', 'content' => 'loading ....',),
        ),
        'events'=>array('shown'=>'js:loadContent')
    )    
);

//$item = V7guiK2Items::model()->findByPk(302); 
//echo '<pre>';
//print_r($item->revisiones);
$id_programa = 302;
$usuario = V7guiUsers::model()->with('revisiones')->find('revisiones.id_estado_revision=1 AND id_programa='.$id_programa);
print_r($usuario);
?>

<script type="text/javascript">

function loadContent(e){

    var tabId = e.target.getAttribute("href");

    var ctUrl = ''; 
    console.log($(e).attr('load'));

    if(tabId == '#tab1') {
        ctUrl = '<?php echo $this->createUrl('programa/ProgramasPublicados');?>';
    } else if(tabId == '#tab2') {
        ctUrl = '<?php echo $this->createUrl('programa/ProgramasPublicados');?>';
    } else if(tabId == '#tab3') {
        ctUrl = '<?php echo $this->createUrl('programa/ProgramasPublicados');?>';
    }

    if(ctUrl != '') {
        $.ajax({
            url      : ctUrl,
            type     : 'POST',
            dataType : 'html',
            cache    : false,
            success  : function(html)
            {
                jQuery(tabId).html(html);
            },
            error:function(){
                    alert('Request failed');
            }
        });
    }
    e.preventDefault();
}


</script>
    