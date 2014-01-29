<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_lente')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_lente), array('view', 'id'=>$data->id_lente)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_diseno')); ?>:</b>
	<?php echo CHtml::encode($data->id_diseno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_material')); ?>:</b>
	<?php echo CHtml::encode($data->id_material); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipodelente')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipodelente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio_terminado')); ?>:</b>
	<?php echo CHtml::encode($data->precio_terminado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('esfera_limite_inferior')); ?>:</b>
	<?php echo CHtml::encode($data->esfera_limite_inferior); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('esfera_limite_superior')); ?>:</b>
	<?php echo CHtml::encode($data->esfera_limite_superior); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cilindro_limite_superior')); ?>:</b>
	<?php echo CHtml::encode($data->cilindro_limite_superior); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cilindro_limite_inferior')); ?>:</b>
	<?php echo CHtml::encode($data->cilindro_limite_inferior); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio_tallado')); ?>:</b>
	<?php echo CHtml::encode($data->precio_tallado); ?>
	<br />

	*/ ?>

</div>