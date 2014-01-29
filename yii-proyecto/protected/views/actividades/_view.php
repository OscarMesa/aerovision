<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_actividad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_actividad), array('view', 'id'=>$data->id_actividad)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('actividad')); ?>:</b>
	<?php echo CHtml::encode($data->actividad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio_x_hora')); ?>:</b>
	<?php echo CHtml::encode($data->precio_x_hora); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>