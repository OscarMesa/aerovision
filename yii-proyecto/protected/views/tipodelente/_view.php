<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipodelente')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipodelente), array('view', 'id'=>$data->id_tipodelente)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_tipodelente')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_tipodelente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('caracteristicas')); ?>:</b>
	<?php echo CHtml::encode($data->caracteristicas); ?>
	<br />


</div>