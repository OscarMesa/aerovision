<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_material')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_material), array('view', 'id'=>$data->id_material)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_material')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_material); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('caracteristicas')); ?>:</b>
	<?php echo CHtml::encode($data->caracteristicas); ?>
	<br />


</div>