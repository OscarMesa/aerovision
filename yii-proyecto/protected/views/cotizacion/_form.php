    <script>
        function validar(){
            if($(Cotizacion_esfera_ojo_derecho).val()=="neutro"||$(Cotizacion_esfera_ojo_derecho).val()=="plano"){
                //alert($(Cotizacion_esfera_ojo_derecho).val());
                $(Cotizacion_esfera_ojo_derecho).val(0);
            }
            if($(Cotizacion_esfera_ojo_izquierdo).val()=="neutro"||$(Cotizacion_esfera_ojo_izquierdo).val()=="plano"){
                //alert($(Cotizacion_esfera_ojo_derecho).val());
                $(Cotizacion_esfera_ojo_izquierdo).val(0);
            }
            if($(Cotizacion_adicion_derecho).val()==""){
                //alert($(Cotizacion_esfera_ojo_derecho).val());
                $(Cotizacion_adicion_derecho).val(0);
            }
            if($(Cotizacion_adicion_izquierdo).val()==""){
                //alert($(Cotizacion_esfera_ojo_derecho).val());
                $(Cotizacion_adicion_izquierdo).val(0);
            }
 }
    </script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cotizacion-form',
	'enableAjaxValidation'=>false,
)); ?>

	
        <?php echo $form->hiddenField($model,'paso'); ?>
        <?php echo $form->errorSummary($model); ?>
<?php if(isset($model->paso)&&$model->paso==1){ ?>
	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_completo'); ?><?php echo $form->error($model,'nombre_completo'); ?>
		<?php echo $form->textField($model,'nombre_completo',array('size'=>60,'maxlength'=>255)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'edad'); ?><?php echo $form->error($model,'edad'); ?>
		<?php echo $form->textField($model,'edad',array('size'=>6,'maxlength'=>6)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono'); ?><?php echo $form->error($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>16,'maxlength'=>16)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'celular'); ?><?php echo $form->error($model,'celular'); ?>
		<?php echo $form->textField($model,'celular',array('size'=>16,'maxlength'=>16)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'direccion'); ?><?php echo $form->error($model,'direccion'); ?>
		<?php echo $form->textField($model,'direccion',array('size'=>60,'maxlength'=>255)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ciudad'); ?><?php echo $form->error($model,'ciudad'); ?>
		<?php echo $form->textField($model,'ciudad',array('size'=>16,'maxlength'=>16)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'departamento'); ?><?php echo $form->error($model,'departamento'); ?>
		<?php echo $form->textField($model,'departamento',array('size'=>16,'maxlength'=>16)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?><?php echo $form->error($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>64)); ?>
		
	</div>
<?php }else if(isset($model->paso)&&$model->paso==2){ ?>
        <p><b><?php echo $model->nombre_completo ?></b>, por favor ingrese los datos de su formula</p>
<table width="200" border="1" cellspacing="0" cellpadding="3">
  <tr>
    <td>&nbsp;</td>
    <td><b>Esfera</b></td>
    <td><b>Cilindro</b></td>
    <td><b>Eje</b></td>
    <td><b>Adición</b></td>
  </tr>
  <tr>
    <td ><b>Ojo Derecho</b></td>
    <td><?php echo $form->textField($model,'esfera_ojo_derecho'); ?><?php echo $form->error($model,'esfera_ojo_derecho'); ?></td>
    <td><?php echo $form->textField($model,'cilindro_ojo_derecho',array('onchange'=>'cambio()')); ?><?php echo $form->error($model,'cilindro_ojo_derecho'); ?></td>
    <td><?php echo $form->textField($model,'eje_ojo_derecho'); ?><?php echo $form->error($model,'eje_ojo_derecho'); ?></td>
    <td><?php echo $form->textField($model,'adicion_derecho'); ?><?php echo $form->error($model,'adicion_derecho'); ?></td>
  </tr>
  <tr>
    <td><b>Ojo Izquierdo</b></td>
    <td><?php echo $form->textField($model,'esfera_ojo_izquierdo'); ?><?php echo $form->error($model,'esfera_ojo_izquierdo'); ?></td>
    <td><?php echo $form->textField($model,'cilindro_ojo_izquierdo'); ?><?php echo $form->error($model,'cilindro_ojo_izquierdo'); ?></td>
    <td><?php echo $form->textField($model,'eje_ojo_izquierdo'); ?><?php echo $form->error($model,'eje_ojo_izquierdo'); ?></td>
    <td><?php echo $form->textField($model,'adicion_izquierdo'); ?><?php echo $form->error($model,'adicion_izquierdo'); ?></td>
  </tr>
</table>
        <strong>Nota:</strong> 
        <ul>
            <li>En el campo <strong>Esfera</strong> la palabra <b>Neutro</b> o <b>plano</b> es lo mismo que copiar 0</li>
        </ul>
	<div class="row">
		<?php echo $form->labelEx($model,'distancia_pupilar'); ?><?php echo $form->error($model,'distancia_pupilar'); ?>
		<?php echo $form->textField($model,'distancia_pupilar'); ?>
		
	</div>



<?php }else if(isset($model->paso)&&$model->paso==3){ ?>
         <p><b><?php echo $model->nombre_completo ?></b>, ahora debe escoger el dise&nacute;o que desea usar</p>
          <div class="row">
		<?php echo $form->labelEx($model,'id_tipo_diseno'); ?><?php echo $form->error($model,'id_tipo_diseno'); ?>
		<?php echo $form->dropDownList($model,'id_tipo_diseno', $tiposDeDiseno, array(
					'ajax'=>array(
						'type'=>'POST', 
						'url'=>CController::createUrl('Cotizacion/dynamicTipoDiseno'), //url a llamar
						//Style: CCController::createUrl('currentController/methodToCall')
						'update'=>'#Cotizacion_id_diseno', //selector to update
						//'data=>'js:javascript statement'
							//leave out the data key to pass all form value through
					)

				)); ?>
		
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'id_diseno'); ?><?php echo $form->error($model,'id_diseno'); ?>
		<?php echo $form->dropDownList($model,'id_diseno', $disenos); ?>
		
	</div>

        <?php }elseif(isset($model->paso)&&$model->paso==4){ ?>
                 <div class="row">
		<?php echo $form->labelEx($model,'id_material'); ?><?php echo $form->error($model,'id_material'); ?>
		<?php echo $form->dropDownList($model,'id_material', $materiales); ?>
		
            </div>
         <?php }elseif(isset($model->paso)&&$model->paso==5){ ?>
         <strong>Precio: </strong><?php  echo $this->cotizar(); ?><br/><br/>
                 <b>Lentes:</b>  <?php echo $model->idDiseno0->idTipoDiseno0->nombre_tipo_diseno . " ". $model->idDiseno0->nombre_diseno. " - ". $model->idMaterial0->nombre_material ?> <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/pencil.png').'Actualizar', array('update', 'id'=>$model->id_cotizacion, 'paso'=>3));?><br/>
                <br/>
                            <div id="filtros">
   <b>Filtros: </b> 
                <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/plus.png').'Agregar', array('agregarFiltro', 'id'=>$model->id_cotizacion));?><br/>

        <?php 

               $this->widget('zii.widgets.grid.CGridView', array(
                'dataProvider'=>$cotizacionFiltros,
                'hideHeader'=>true,
                'summaryText'=>"",
                'columns'=>array(
                        array(
                           'name'=>'id_filtro',
                            'value'=>'$data->idFiltro0->nombre_filtro',
                            'header'=>"Filtros",
                        ),
                         array(            // display a column with "view", "update" and "delete" buttons
                            'class'=>'CButtonColumn',
                             'header'=>'Acciones',
                            'template'=>'{delete}',
                             'deleteConfirmation'=>'Esta seguro que desea elimnar el filtro?',
                            'buttons'=>array(
                                'delete'=>array(
                                    'label'=>'Eliminar filtro',
                                    'imageUrl'=>Yii::app()->theme->baseUrl.'/images/icons/cross.png',
                                    'url'=>'Yii::app()->createUrl("cotizacion/eliminarFiltro",array("id_cotizacion"=>$_GET["id"], "id_filtro"=>$data->id_filtro))',
                                    )
                                ),
                             ),
                    ),

        )); ?>
        </div>
                
                
                
                <br/><br/><br/>
                Su formula es: <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/pencil.png').'Actualizar', array('update', 'id'=>$model->id_cotizacion, 'paso'=>2));?>
<table width="400" border="1" cellspacing="0" cellpadding="3">
  <tr>
    <td>&nbsp;</td>
    <td><b>Esfera</b></td>
    <td><b>Cilindro</b></td>
    <td><b>Eje</b></td>
    <td><b>Adición</b></td>
  </tr>
  <tr>
    <td ><b>Ojo Derecho</b></td>
    <td><?php echo $model->esfera_ojo_derecho ?></td>
    <td><?php echo $model->cilindro_ojo_derecho ?></td>
    <td><?php echo $model->eje_ojo_derecho; ?></td>
    <td><?php echo $model->adicion_derecho; ?></td>
  </tr>
  <tr>
    <td><b>Ojo Izquierdo</b></td>
    <td><?php echo $model->esfera_ojo_izquierdo; ?></td>
    <td><?php echo $model->cilindro_ojo_izquierdo; ?></td>
    <td><?php echo $model->eje_ojo_izquierdo; ?></td>
    <td><?php echo $model->adicion_izquierdo; ?></td>
  </tr>
</table>
         
         <?php } ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Siguiente', array('onclick'=>'validar()')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->