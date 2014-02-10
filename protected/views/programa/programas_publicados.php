<?php
    $this->menu=array(
        array('label'=>'Inicio','url'=>Yii::app()->baseUrl),
);
?>

<?php
Yii::import('application.vendor.*');
$criteria = new CDbCriteria();
$criteria->alias = 'item';
$criteria->with = array(
    'adjuntos' => array(
        'alias' => 'a_adj',
    ),
    'category' => array(
        'aliar' => 'cat',
    ),
);
$criteria->addInCondition('item.catid', V7guiK2Categories::buscarTodasCategorias(3));
$criteria->order = 'item.title';
$dataProvider = new CActiveDataProvider('V7guiK2Items', array(
    'criteria' => $criteria,
    'pagination' => array(
        'pageSize' => 20,
    )
        )
);
?>
<table id="tbl-filtros">
    <thead>

        <tr><th>Fecha</th><th>Categoria</th></tr>
    </thead>
    <tr>
        <td>   
            <?php
            $this->widget(
                    'bootstrap.widgets.TbButtonGroup', array(
                'type' => 'primary',
                // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                'htmlOptions' => array(
                    'id' => 'rangos-fechas',
                ),
                'buttons' => array(
                    array('label' => 'Filtro:', 'url' => '#',),
                    array(
                        'items' => array(
                            array('label' => 'Según Ultima actualización',),
                            array('label' => 'Hace menos de 1 mes', 'url' => '#act,1',),
                            array('label' => 'Entre 1 y 2 meses', 'url' => '#act,2'),
                            array('label' => 'Entre 2 y 4 meses', 'url' => '#act,3',),
                            array('label' => 'Entre 4  y 8 meses', 'url' => '#act,4'),
                            array('label' => 'Entre 8 meses y 12 meses', 'url' => '#act,5'),
                            array('label' => 'Hace mas de un año', 'url' => '#act,6'),
                            array('label' => 'Según fecha de finalización de publicación'),
                            array('label' => 'Sin fecha de finalización', 'url' => '#fin,1'),
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
        </td>
        <td>
            <?php
            $this->widget(
                    'bootstrap.widgets.TbButtonGroup', array(
                'type' => 'primary',
                // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                'htmlOptions' => array(
                    'id' => 'filtro-categorias',
                ),
                'buttons' => array(
                    array('label' => 'Categorias:', 'url' => '#',),
                    array(
                        'items' => V7guiK2Categories::buscarCategoriasFiltro(3),
                    ),
                ),
                    )
            );
            ?>
        </td>
    </tr>
</table>
<div>
    <form class="form-search" id="buscador-titulo">
        <div class="input-append">
            <input type="text" id="texto-filtro" class="span6 search-query btn-large" placeholder="Filtro por titulo" style="padding: 11px 19px;font-size: 17.5px;">
            <button type="submit" class="btn btn-large">
                <i class="icon-search"></i>
                Buscar
            </button>
        </div>
    </form>
</div>
<?php ?>
<div id="grid-lista-programas">
    <?php
    $usuario = V7guiUsers::model()->findByPk(Yii::app()->user->getId());
    $perfil = Utilidades::validarTipoUsuario($usuario->grupos);
    if ($perfil->id == 8) {
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'lista-programas',
            'dataProvider' => $dataProvider,
            //'filter' => V7guiK2Items::model(),
            'type' => 'striped bordered condensed',
            'columns' => array(
                array(
                    'type' => 'raw',
                    'header' => V7guiK2Items::generarHeaderGrid('title'),
                    'value' => function($data){
                        return Utilidades::generarTitulo($data);
                    }
                  )  
                ,
                'created',
                'modified',
                'publish_down',
                array(
                    'type' => 'raw',
                    'header' => 'Adjuntos',
                    'value' => 'Utilidades::popDropBox($data->adjuntos)'
                ),
                array(
                    'type' => 'raw',
                    'header' => 'Estado',
                    'value' => function($data, $row) use ($perfil) {
                        return Utilidades::generarEstado($data, $perfil);
                    },
                ),
                array(
                    'type' => 'raw',
                    'header' => 'Editar',
                    'value' => 'Utilidades::generarButtonEdit($data)',
                ),              
            ),
                )
        );
    } else if ($perfil->id == 7) {
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'lista-programas',
            'dataProvider' => $dataProvider,
            //'filter' => V7guiK2Items::model(),
            'type' => 'striped bordered condensed',
            'columns' => array(
                array(
                    'type' => 'raw',
                    'header' => V7guiK2Items::generarHeaderGrid('title'),
                    'value' => function($data){
                        return Utilidades::generarTitulo($data);
                    }
                  ),
                'created',
                'modified',
                'publish_down',
                array(
                    'type' => 'raw',
                    'header' => 'Adjuntos',
                    'value' => 'Utilidades::popDropBox($data->adjuntos)'
                ),
                array(
                    'type' => 'raw',
                    'header' => 'Adjuntar archivo',
                    'value' => 'Utilidades::generarLink($data)'
                ),
                array(
                    'type' => 'raw',
                    'header' => 'Estado',
                    'value' => function($data, $row) use ($perfil) {
                        return Utilidades::generarEstado($data, $perfil);
                    },
                ),
                array(
                    'type' => 'raw',
                    'header' => 'Editar',
                    'value' => 'Utilidades::generarButtonEdit($data)',
                ),            
            ),
                )
        );
    }
    ?>
</div>

<script type="text/javascript">

    $(document).on('ready', function() {
        $('#rangos-fechas .dropdown-menu a').each(function(index, element)
        {
            $(element).attr('onclick', 'cargarFiltro($(this))');
        });

        $('#filtro-categorias .dropdown-menu a').each(function(index, element)
        {
            $(element).attr('onclick', 'cargarFiltrosCategorias($(this))');
        });
    });
    
    $('#buscador-titulo').on('submit',function(e){
        $('#filtro-categorias a').first().html('Categorias:');
        $('#rangos-fechas a').first().html('Filtro:');
        $.post('<?php echo Yii::app()->createUrl('usuario/BuscadorFiltro') ?>',{'val-filtro':$('#texto-filtro').val()},function(e){
             $('#grid-lista-programas').html(e);
        });
        e.preventDefault();
    });

    function cargarFiltro(e)
    {
        $('#rangos-fechas a').first().html(e.html());
        $('#filtro-categorias a').first().html('Categorias:');
        $('#texto-filtro').val('');
        $.ajax({
            type: 'post',
            data: 'data=' + e.attr('href').split(','),
            url: '<?php echo Yii::app()->createUrl('usuario/FiltroProgramasXFechas') ?>',
            success: function(r) {
                $('#grid-lista-programas').html(r);
            },
            error: function(r) {
                console.log(r);
            }
        });
        //return false;
    }

    function cargarFiltrosCategorias(e)
    {
        $('#filtro-categorias a').first().html(e.html());
        $('#rangos-fechas a').first().html('Filtro:');
        $('#texto-filtro').val('');
        $.ajax({
            type: 'post',
            data: 'data=' + e.attr('href').split(','),
            url: '<?php echo Yii::app()->createUrl('usuario/FiltroProgramasXCategorias') ?>',
            success: function(r) {
                $('#grid-lista-programas').html(r);
            },
            error: function(r) {
                console.log(r);
            }
        });
    }
</script>
