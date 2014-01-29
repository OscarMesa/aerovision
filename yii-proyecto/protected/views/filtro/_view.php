<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_filtro')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_filtro), array('view', 'id'=>$data->id_filtro)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_filtro')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_filtro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('caracteristicas')); ?>:</b>
	<?php echo CHtml::encode($data->caracteristicas); ?>
	<br />


</div>