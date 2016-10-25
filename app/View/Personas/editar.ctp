<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<?php echo $this->Html->link(__('<i class="fa fa-backward"></i> Atrás'), array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
			<div class="ln_solid"></div>
			<div class="x_content">
				<?php echo $this->Form->create('Persona', array(
				'class' => '', 
				'role' => 'form',
				'autocomplete' => 'off',
				'inputDefaults' => array(
					'format' => array('before', 'label', 'between', array('input', 'checkbox'), 'error', 'after'),
					'div' => array('class' => 'form-group col-sm-6 col-lg-3 col-xs-12'),
					'class' => array('form-control'),
					'label' => array('class' => ''),
					'between' => '<div class="controls">',
					'after' => '</div>',
					'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
				)));
				echo $this->Form->hidden('id');
				echo '<p> <legend>Identificaci&oacute;n</legend></p>';
				echo '<div class="row">';
				echo $this->Form->input('cui', array('label' => array('text'=> 'CUI')));
				echo $this->Form->input('no_igss', array('label' => array('text'=> 'No. Afiliación de IGSS'), 'data-mask' => '999999999999'));
				echo $this->Form->input('nit', array('label' => array('text'=> 'NIT')));
				echo '</div>';
				echo '<p> <legend>Informaci&oacute;n Personal</legend></p>';
				echo '<div class="row">';
				echo $this->Form->input('primer_nombre', array('label' => array('text'=> 'Primer nombre')));
				echo $this->Form->input('segundo_nombre', array('label' => array('text'=> 'Segundo Nombre')));
				echo $this->Form->input('primer_apellido', array('label' => array('text'=> 'Primer apellido')));
				echo $this->Form->input('segundo_apellido', array('label' => array('text'=> 'Segundo apellido')));
				echo '</div>';
				echo '<div class="row">';
				echo $this->Form->input('apellido_casada', array('label' => array('text'=> 'Apellido de Casada')));
				$generos = array(1 => 'Masculino', 2 => 'Femenino');
				echo $this->Form->input('genero', array('label' => array('text'=> 'Género'), 'options' => $generos));
				$estado_civil = array(1 => 'Soltero (a)',  2 => 'Casado(a)', 3 => 'Divorciado (a)', 4 => 'Viudo (a)');
				echo $this->Form->input('estado_civil', array('label' => array('text'=> 'Estado Civil'), 'options' => $estado_civil));
				$nacionalidad = array(1 => 'Guatemalteco (a)', 2 => 'Extranjero (a)');
				echo $this->Form->input('nacionalidad', array('label' => array('text'=> 'Nacionalidad'), 'options' => $nacionalidad));
				echo '</div>';
				echo '<div class="row">';
				echo $this->Form->input('tipo_sangre', array('label' => array('text'=> 'Tipo de sangre'), 'options' => $tipo_sangre));
				echo $this->Form->input('fec_nacimiento', array('label' => array('text'=> 'Fecha de Nacimiento'), 'type' => 'text' ));
				echo $this->Form->input('lug_nacimiento', array('label' => array('text'=> 'Lugar de Nacimiento'), 'type' => 'text' ));
				echo '</div>';
				echo '<p> <legend>Información Laboral</legend></p>';
				echo '<div class="row">';
				echo $this->Form->input('no_empleado', array('label' => array('text'=> 'Empleado No.'), 'type' => 'text' ));
				echo $this->Form->input('no_acuerdo', array('label' => array('text'=> 'Acuerdo No.'), 'type' => 'text' ));
				echo $this->Form->input('no_acta', array('label' => array('text'=> 'Acta No.'), 'type' => 'text' ));
				echo $this->Form->input('no_libro', array('label' => array('text'=> 'Libro No.'), 'type' => 'text' ));
				echo '</div>';
				echo '<div class="row">';
				echo $this->Form->input('salario', array('label' => array('text'=> 'Salario Q.'), 'type' => 'text' ));
				echo '</div>';
				echo '<p> <legend>Contácto</legend></p>';
				echo '<div class="row">';
				echo $this->Form->input('id_departamento', array('label' => array('text'=> 'Departamento'), 'type' => 'select', 'options' => $departamentos));
				echo $this->Form->input('id_municipio', array('label' => array('text'=> 'Municipio'), 'type' => 'select', 'options' => $municipios));
				echo $this->Form->input('dir_residencia', array('label' => array('text'=> 'Dirección de Residencia'), 'type' => 'text'));
				echo $this->Form->input('nums_telefono', array('label' => array('text'=> 'Teléfonos de contácto'), 'type' => 'text'));
				echo '</div>';
				echo '<div class="row">';
				echo $this->Form->input('id_puesto', array('label' => array('text'=> 'Puesto'), 'type' => 'select', 'options' => $puestos));
				echo '</div>';
				$options = array('label' => 'Editar', 'class' => 'btn btn-success', 'div' => false, 'escape' => false );
				echo '<div class="ln_solid"></div>';
				echo $this->Form->end($options); ?>
			</div> <!-- /.x-content -->
		</div><!-- /.x-panel -->
	</div>  <!-- /.col -->
</div><!-- /.row -->


<?php $this->Js->buffer("
	var d = ($('#PersonaFecNacimiento').val()).split('-');
	$('#PersonaFecNacimiento').val(d[2]+'/'+d[1]+'/'+d[0]);
	 $('#PersonaEditarForm').bootstrapValidator({
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
			\"data[Persona][cui]\": {
				validators: {
					notEmpty: {
						message: 'Es necesario que ingrese una identificación'
					}
				}
			},
			\"data[Persona][primer_nombre]\": {
				validators: {
					notEmpty: {
						message: 'Es necesario que ingrese un nombre'
					}
				}
			},
			\"data[Persona][primer_apellido]\": {
				validators: {
					notEmpty: {
						message: 'Es necesario que ingrese un apellido'
					}
				}
			},
			\"data[Persona][tipo_sangre]\": {
				validators: {
					notEmpty: {
						message: 'Es necesario que seleccione un tipo de sangre'
					}
				}
			},
			\"data[Persona][fec_nacimiento]\": {
				validators: {
					notEmpty: {
						message: 'Debe ingresar una fecha de nacimiento'
					},
					date:{
						format: 'DD/MM/YYYY',
						message: 'Por favor, ingresar una fecha válida'
					}
				}
			},
			\"data[Persona][dir_residencia]\": {
				validators: {
					notEmpty: {
						message: 'Debe ingresar una dirección de residencia'
					}
				}
			}
		}
	});

	var optionSet1 = {
		singleDatePicker: true,
		calender_style: 'picker_3',
		format: 'DD/MM/YYYY',
		locale: {
			daysOfWeek: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
			monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			firstDay: 1
		}
	};	

	$('#PersonaFecNacimiento').daterangepicker(optionSet1, function(start, end, label) {});

	$('#PersonaFecNacimiento').inputmask('99/99/9999');
	$('#PersonaCui').inputmask('9999-99999-9999');
");
	$this->Js->get('#PersonaIdDepartamento')->event('click',
		$this->Js->request(
			array('controller' => 'Personas', 'action' => 'filterMunicipios'),
			array(
				'update' => '#PersonaIdMunicipio',
				'async' => true,
				'dataExpression' => true,
				'method' => 'post',
				'data' => $this->Js->serializeForm(array('isForm' => true, 'inline' => true))
			)
		)
	);
?>
