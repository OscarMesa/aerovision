<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_completo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nombre_completo), array('view', 'id'=>$data->id_usuario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

</div>