	<div class="row">
		<div>
			<center>
			<!-- <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1> -->
			<img class="img-responsive" src="<?php echo $this->webroot;?>/img/redo.png" alt="logo_redo" width="65%">
			</center>
		</div>
	</div>
<?php
	echo $this->Form->create
	(
		'User',
		array
		(
			'url' => array
			(
				'controller' => 'users',
				'action'	 => 'login'
			),
			'id'			=> 'formLogin',
			'inputDefaults' => array
			(
				'label' => false,
				'error' => false
			)
		)
	);
?>
	<h1>Inicio de Sesión</h1>
<?php
	echo $this->Form->input('username', array('label' => false, 'placeholder' => __('Usuario'), 'class' => 'form-control', 'after' => '<span class="fa fa-user form-control-feedback right"></span>', 'div'=>array('class'=>'form-group has-feedback')));
	echo $this->Form->input('password', array('label' => false, 'placeholder' => __('Contraseña'), 'type' => 'password', 'class' => 'form-control', 'after' => '<span class="fa fa-lock form-control-feedback right"></span>', 'div'=>array('class'=>'form-group has-feedback')));
?>
	
	<div class="row">
		<div class="form-group col-md-8">
			<input type="submit" class="btn btn-primary" value="Entrar">
		</div>
	</div>
	<div class="clearfix"></div>

	<div class="separator">
		<div class="clearfix"></div>
		<div>
			<!-- <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1> -->
			<div class="col-md-8">
				<img class="img-responsive" src="<?php echo $this->webroot;?>/img/itys.png" alt="itys_corp">
			</div>
			<div class="col-md-4">
				<img class="img-responsive" src="<?php echo $this->webroot;?>/img/umg_logo.png" alt="itys_corp">
			</div>

		</div>
	</div>
	<div class="clearfix"></div>
	<br />
	<p>©2016 Todos los Derechos Reservados.</p>
</form>
