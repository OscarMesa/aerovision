<?php
$up_id = uniqid();
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'v7gui-k2-items-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'title', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->dropDownListRow($model, 'catid', V7guiK2Categories::buscarCategoriasFiltro(3, TRUE), array('class' => 'span5')); ?>

<?php //echo $form->textFieldRow($model, 'alias', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php //echo CHtml::label(V7guiK2Items::generarHeaderGrid('introtext'), 'V7guiK2Items_introtext') ?>

<?php //$this->widget('application.widgets.redactorjs.Redactor', array('editorOptions' => array('autoresize' => true, 'fixed' => true), 'model' => $model, 'attribute' => 'introtext')); ?>
<!--<br/>-->
<?php //$this->widget('application.widgets.redactorjs.Redactor', array('editorOptions' => array('autoresize' => true, 'fixed' => true), 'model' => $model, 'attribute' => 'fulltext')); ?>
<!--<br/>-->

<?php echo CHtml::label(V7guiK2Items::generarHeaderGrid('created'), 'V7guiK2Items_created') ?>

<?php
$this->widget(
        'ext.jui.EJuiDateTimePicker', array(
    'model' => $model,
    'attribute' => 'created',
    //'language'=> 'ru',//default Yii::app()->language
    'mode' => 'datetime', //'datetime' or 'time' ('datetime' default)
    'value' => $model->created,
    'options' => array(
        'defaultValue' => $model->created,
        'dateFormat' => 'yy-mm-dd ',
        'timeFormat' => 'hh:mm:ss', //'hh:mm tt' default
        'hourGrid' => date("H", strtotime($model->created)),
        'minuteGrid' => date("i", strtotime($model->created)),
        'hour' => date("H", strtotime($model->created)),
        'stepHour' => 7
    ),
        )
);
?>

<?php echo CHtml::label(V7guiK2Items::generarHeaderGrid('modified'), 'V7guiK2Items_modified') ?>

<?php
$this->widget(
        'ext.jui.EJuiDateTimePicker', array(
    'model' => $model,
    'attribute' => 'modified',
    //'language'=> 'ru',//default Yii::app()->language
    'mode' => 'datetime', //'datetime' or 'time' ('datetime' default)
    'value' => $model->modified,
    'options' => array(
        'defaultValue' => $model->modified,
        'dateFormat' => 'yy-mm-dd ',
        'timeFormat' => 'hh:mm:ss', //'hh:mm tt' default
        'hourGrid' => date("H", strtotime($model->modified)),
        'minuteGrid' => date("i", strtotime($model->modified)),
        'hour' => date("H", strtotime($model->modified)),
        'stepHour' => 7
    ),
        )
);
?>

<?php echo CHtml::label(V7guiK2Items::generarHeaderGrid('publish_down'), 'V7guiK2Items_publish_down') ?>

<?php
$this->widget(
        'ext.jui.EJuiDateTimePicker', array(
    'model' => $model,
    'attribute' => 'publish_down',
    //'language'=> 'ru',//default Yii::app()->language
    'mode' => 'datetime', //'datetime' or 'time' ('datetime' default)
    'value' => $model->publish_down,
    'options' => array(
        'defaultValue' => $model->publish_down,
        'dateFormat' => 'yy-mm-dd ',
        'timeFormat' => 'hh:mm:ss', //'hh:mm tt' default
        'hourGrid' => date("H", strtotime($model->publish_down)),
        'minuteGrid' => date("i", strtotime($model->publish_down)),
        'hour' => date("H", strtotime($model->publish_down)),
        'stepHour' => 7
    ),
        )
);
?>

<?php //echo CHtml::label(V7guiK2Items::generarHeaderGrid('fileUpload'), 'V7guiK2Items_fileUpload') ?>

<?php Yii::import('application.vendor.Utilidades'); ?>

<!--<div class="bs-docs-archivos" id="conetendor-archivos">
    <?php
   // echo Utilidades::generarUploadFileModific($model->getAdjuntosAppYii());
    ?>
</div>    -->
<?php
//$this->widget('bootstrap.widgets.TbButton', array(
//    'label' => 'Agregar Archivo',
//    'size' => 'small',
//    'type' => 'primary',
//    'buttonType' => 'button',
//    'htmlOptions' => array('style' => 'display:block;margin-top:12px;margin-bottom:6px;', 'id' => 'agregar-archivo'),
//));
?>  
<script>
    $(document).on('click', '#agregar-archivo', function(r) {
        ele = $('.bs-docs-archivos').find('input[type="file"]');
        var div = document.createElement("div");
        div.id = 'archivo_' + (ele.length + 1);
        $(div).attr('class','archivos');
        var input = document.createElement("input");
        input.type = "file";
        input.id = 'V7guiK2Items_fileUpload_' + (ele.length + 1);
        input.class = "span3";
        input.name = 'archivo[]';
        div.appendChild(input);
        conteiner = document.getElementById('conetendor-archivos');
        conteiner.appendChild(div);

    });
    $(document).on('click', '.remove-adjunto', function(e) {
        //Borramos el tr
        $(this).parent().parent().remove();
        e.preventDefault();
    });


    $(document).on('change', 'input[type=file]', prepareUpload);
    // Grab the files and set them to our variable
    function prepareUpload(event)
    {
        var img = generarLoader();
        var div_parent = $(event.currentTarget).parent();
        $(event.currentTarget).parent().append(img);
        files = event.target.files;
        console.log(files);
        var data = new FormData();
        $.each(files, function(key, value)
        {
            data.append(key, value);
        });
        $.ajax({
            url: '<?php echo Yii::app()->createUrl('programa/subirImagen'); ?>',
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data, textStatus, jqXHR)
            {
                if (typeof data.error === 'undefined')
                {
                    // Success so call function to process the form
                    submitForm(event, data);
                }
                else
                {
                    setTimeout(function(){
                        $(img).remove();
                        div_parent.html('<ul><li>' + data.nombre_archivo + '</li></ul>');
                    },1000);
                }
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                // Handle errors here
                console.log('ERRORS: ' + textStatus);
                // STOP LOADING SPINNER
            }
        });





    }
    
    function generarLoader()
    {
        var img = document.createElement("img");
        img.id = 'imgloader';
        img.src = '<?php echo Yii::app()->baseUrl; ?>/themes/aerovision/images/loader.gif';
        return img;
    }
</script>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>


<div id="progress_container"> 
    <div id="progress_bar"> 
        <div id="progress_completed"></div> 
    </div> 
</div> 

<?php
$this->endWidget();
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/themes/aerovision/js/subirArchivo.js', CClientScript::POS_HEAD);
?>


