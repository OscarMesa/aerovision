<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_sede')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_sede), array('view', 'id'=>$data->id_sede)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_sede')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_sede); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciudad')); ?>:</b>
	<?php echo CHtml::encode($data->ciudad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />


</div>