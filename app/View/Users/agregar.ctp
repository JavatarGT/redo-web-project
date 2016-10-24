<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<?php echo $this->Html->link(__('<i class="fa fa-backward"></i> Atrás'), array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
			<div class="ln_solid"></div>
			<div class="x_content">
				<?php echo $this->Form->create('Establecimiento', array(
				'class' => '', 
				'role' => 'form',
				'autocomplete' => 'off',
				'inputDefaults' => array(
					'format' => array('before', 'label', 'between', array('input', 'checkbox'), 'error', 'after'),
					'div' => array('class' => 'form-group col-sm-6 col-lg-4 col-xs-12'),
					'class' => array('form-control'),
					'label' => array('class' => ''),
					'between' => '<div class="controls">',
					'after' => '</div>',
					'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
				)));
				echo '<div class="row">';
				echo $this->Form->input('username', array('label' => array('text'=> 'Usuario')));
				echo $this->Form->input('name', array('label' => array('text'=> 'Nombres')));
				echo $this->Form->input('email', array('label' => array('text'=> 'Correo Electrónico'), 'type' => 'email'));
				echo '</div>';
				echo '<div class="row">';
				echo $this->Form->input('password', array('label' => array('text'=> 'Contraseña'), 'type' => 'password'));
				echo $this->Form->input('group_id', array('label' => array('text'=> 'Grupo')));
				echo $this->Form->input('id_persona', array('label' => array('text'=> 'Personal'), 'type' => 'select', 'options' => $personas));
				echo '</div>';
				$options = array('label' => 'Agregar', 'class' => 'btn btn-success', 'div' => false, 'escape' => false );
				echo '<div class="ln_solid"></div>';
				echo $this->Form->end($options); ?>
			</div> <!-- /.x-content -->
		</div><!-- /.x-panel -->
	</div>	<!-- /.col -->
</div><!-- /.row -->


<?php $this->Js->buffer("
	 $('#UserAgregarForm').bootstrapValidator({
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
						message: 'Es necesario que ingrese una contraseña'
					}
				}
			}
		}
	});
");
?>