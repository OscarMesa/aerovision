<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_diseno')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_diseno), array('view', 'id'=>$data->id_diseno)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_diseno')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_diseno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('caracteristicas')); ?>:</b>
	<?php echo CHtml::encode($data->caracteristicas); ?>
	<br />


</div>