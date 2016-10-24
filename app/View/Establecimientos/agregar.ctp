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
				echo $this->Form->input('nombre', array('label' => array('text'=> 'Nombre de Establecimiento'), 'type' =>  'text'));
				echo $this->Form->input('cod_departamento', array('label' => array('text'=> 'Departamento ubicación'), 'type' =>  'number'));
				echo $this->Form->input('cod_municipio', array('label' => array('text'=> 'Municipio ubicación'), 'type' =>  'number'));
				echo '</div>';
				echo '<div class="row">';
				echo $this->Form->input('observaciones', array('label' => array('text'=> 'Observaciones'), 'type' =>  'text'));
				echo $this->Form->input('estado_activo', array('label' => array('text'=> 'Estado Activo'), 'type' =>  'number'));
				echo '</div>';
				$options = array('label' => 'Agregar', 'class' => 'btn btn-success', 'div' => false, 'escape' => false );
				echo '<div class="ln_solid"></div>';
				echo $this->Form->end($options); ?>
			</div> <!-- /.x-content -->
		</div><!-- /.x-panel -->
	</div>	<!-- /.col -->
</div><!-- /.row -->


<?php $this->Js->buffer("
	 $('#EstablecimientoAgregarForm').bootstrapValidator({
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
			\"data[Establecimiento][nombre]\": {
				validators: {
					notEmpty: {
						message: 'Es necesario que ingrese un nombre de establecimiento'
					}
				}
			},
			\"data[Establecimiento][cod_departamento]\": {
				validators: {
					notEmpty: {
						message: 'Es necesario que seleccione un departamento'
					}
				}
			},
			\"data[Establecimiento][cod_municipio]\": {
				validators: {
					notEmpty: {
						message: 'Es necesario que seleccione un municipio'
					}
				}
			},
			\"data[Establecimiento][estado_activo]\": {
				validators: {
					notEmpty: {
						message: 'Es necesario que indique el estado del establecimiento'
					}
				}
			}
		}
	});
");
?>