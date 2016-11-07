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
				'action'	 => 'signin'
			),
			'id'			=> 'FormSignin',
			'inputDefaults' => array
			(
				'label' => false,
				'error' => false
			)
		)
	);
?>
	<h1>Crear Cuenta</h1>
<?php
	echo $this->Form->input('primer_nombre', array('label' => false, 'placeholder' => __('Primer Nombre'), 'class' => 'form-control', 'after' => '<span class="fa fa-user form-control-feedback right"></span>', 'div'=>array('class'=>'form-group has-feedback')));
	echo $this->Form->input('primer_apellido', array('label' => false, 'placeholder' => __('Primer Apellido'), 'class' => 'form-control', 'after' => '<span class="fa fa-user form-control-feedback right"></span>', 'div'=>array('class'=>'form-group has-feedback')));
	echo $this->Form->input('id_establecimiento', array('label' => false, 'placeholder' => __('Establecimiento'), 'class' => 'form-control', 'after' => '<span class="fa fa-institution form-control-feedback right"></span>', 'div'=>array('class'=>'form-group has-feedback'), 'type' => 'select', 'options' => $establecimientos));
	echo $this->Form->input('email', array('label' => false, 'placeholder' => __('Correo Electrónico'), 'class' => 'form-control', 'after' => '<span class="fa fa-envelope form-control-feedback right"></span>', 'div'=>array('class'=>'form-group has-feedback')));
	echo $this->Form->input('username', array('label' => false, 'placeholder' => __('Usuario'), 'class' => 'form-control', 'after' => '<span class="fa fa-user form-control-feedback right"></span>', 'div'=>array('class'=>'form-group has-feedback')));
	echo $this->Form->input('password', array('label' => false, 'placeholder' => __('Contraseña'), 'type' => 'password', 'class' => 'form-control', 'after' => '<span class="fa fa-lock form-control-feedback right"></span>', 'div'=>array('class'=>'form-group has-feedback')));
?>
	
	<div class="row">
		<div class="form-group col-md-8">
			<input type="submit" class="btn btn-default" value="Crear cuenta">
		</div>
	</div>
	<div class="clearfix"></div>

	<div class="separator">
		<p class="change_link">Ya es miembro?
			<a href="#signin" class="to_register"> Iniciar Sesión </a>
		</p>
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

<?php $this->Js->buffer("
	 $('#FormSignin').bootstrapValidator({
		excluded: [':disabled'],
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		submitHandler: function (validator, form, submitButton) {
			// Do nothing
		},
		fields: {
			\"data[User][primer_nombre]\": {
				validators: {
					notEmpty: {
						message: 'Es necesario que ingrese un primer nombre de usuario'
					}
				}
			},
			\"data[User][primer_apellido]\": {
				validators: {
					notEmpty: {
						message: 'Es necesario que ingrese un primer apellido de usuario'
					}
				}
			},
			\"data[User][username]\": {
				validators: {
					notEmpty: {
						message: 'Es necesario que ingrese un nombre de usuario'
					}
				}
			},
			\"data[User][password]\": {
				validators: {
					notEmpty: {
						message: 'Es necesario que ingrese una contraseña de usuario'
					}
				}
			}
		}
	});
");
?>