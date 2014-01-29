

	<?php 
	$id_usuario = $data->id_usuario;
	$usuario  = Usuario::model()->findByPk($id_usuario);
	
	$nombre = $usuario->nombre_usuario . " " .$usuario->apellidos_usuario; ?>

        <span>
	<?php echo $nombre. " ". CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/cross.png', 'Eliminar'), array('/usuarioAdminXLugar/delete', 'id_usuario'=>$data->id_usuario,'id_lugar'=>$data->id_lugar), array('submit'=>array('delete','id'=>$data->id_usuario),'confirm'=>'Esta seguro que desea remove a este usuario como administrador?'));
; ?>
        </span>
	<br />

