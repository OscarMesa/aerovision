<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_moneda')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_moneda), array('view', 'id'=>$data->id_moneda)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_moneda')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_moneda); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
        
	<br />
        <b><?php echo CHtml::encode($data->getAttributeLabel('id_articulo')); ?>:</b>
	<?php echo CHtml::encode($data->id_articulo); ?>
        
	<br />


</div>