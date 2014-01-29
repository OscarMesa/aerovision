<?php foreach($roles as $rol): ?>
<div class="roles_usuario">


	<?php /* echo CHtml::link("#{$comment->id_comentario_lugar}", $comment->getUrl($post), array(
		'class'=>'cid',
		'title'=>'Permalink to this comment',
	));*/ ?>




	<div class="content">
		<?php 
		echo $rol->itemname. " - ".  CHtml::link(CHtml::encode("Quitar"), array('/authassignment/delete', 'userid'=>$rol->userid, 'name'=>$rol->itemname)); ?>
	<br />
		
		
	</div>

</div>
<?php endforeach; ?>