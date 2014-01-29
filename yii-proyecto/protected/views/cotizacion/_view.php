<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cotizacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_cotizacion), array('view', 'id'=>$data->id_cotizacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_completo')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_completo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('edad')); ?>:</b>
	<?php echo CHtml::encode($data->edad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('celular')); ?>:</b>
	<?php echo CHtml::encode($data->celular); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciudad')); ?>:</b>
	<?php echo CHtml::encode($data->ciudad); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('departamento')); ?>:</b>
	<?php echo CHtml::encode($data->departamento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('esfera_ojo_derecho')); ?>:</b>
	<?php echo CHtml::encode($data->esfera_ojo_derecho); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('esfera_ojo_izquierdo')); ?>:</b>
	<?php echo CHtml::encode($data->esfera_ojo_izquierdo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cilindro_ojo_derecho')); ?>:</b>
	<?php echo CHtml::encode($data->cilindro_ojo_derecho); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cilindro_ojo_izquierdo')); ?>:</b>
	<?php echo CHtml::encode($data->cilindro_ojo_izquierdo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eje_ojo_izquierdo')); ?>:</b>
	<?php echo CHtml::encode($data->eje_ojo_izquierdo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eje_ojo_derecho')); ?>:</b>
	<?php echo CHtml::encode($data->eje_ojo_derecho); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adicion_derecho')); ?>:</b>
	<?php echo CHtml::encode($data->adicion_derecho); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adicion_izquierdo')); ?>:</b>
	<?php echo CHtml::encode($data->adicion_izquierdo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('distancia_pupilar')); ?>:</b>
	<?php echo CHtml::encode($data->distancia_pupilar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lente')); ?>:</b>
	<?php echo CHtml::encode($data->lente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	*/ ?>

</div>