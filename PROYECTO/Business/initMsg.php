<?php

if(!$mensajes){
	?>
	<div class="container">
		<div class="jumbotron noMsg">
			<p class="text-center">No tienes mensajes</p>
		</div>
	</div>
	<?php
}
foreach($mensajes as $msg){
	if($msg->getEstado() == 'NUEVO'){
		?>
		<div class="jumbotron nuevo">
			<?php
		}else{
			?>
			<div class="jumbotron">
				<?php
			}
			?>
			<div class="card col-md-12">
				<div class="card-header" >
					<?=OpDb::selectNickByCod($msg->getCodEmisor())?>
					<button class="btn btn-outline-secondary leido float-right" data="<?=$msg->getCodMensaje()?>">Marcar como leido</button>
				</div>
				<div class="card-body">
					<h5 class="card-title">Asunto: <?=$msg->getAsunto()?></h5>
					<p class="card-text"><?=$msg->getMensaje()?></p>
					<div class="card-footer text-muted">
						<?=$msg->getFecha()?>

						<!--<button class="btn btn-outline-danger borrar">Eliminar</button>-->
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	?>