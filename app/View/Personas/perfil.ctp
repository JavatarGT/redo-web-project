<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Reporte de Usuario <small>Reporte de Actividades</small></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
					<div class="profile_img">
						<div id="crop-avatar">
							<!-- Current avatar -->
							<img class="img-responsive avatar-view" src="<?php echo $this->base.'/files/images/img1.jpg' ?>" alt="Avatar" title="Change the avatar">
						</div>
					</div>
					<h3><?php echo $this->request->data['Persona']['nombre_completo']; ?></h3>
					<ul class="list-unstyled user_data">
						<li><i class="fa fa-map-marker user-profile-icon"></i> COBÁN, ALTA VERAPAZ</li>
					</ul>

					<br />
				</div><!-- /.profile-left -->
				<div class="col-md-9 col-sm-9 col-xs-12">
					<div class="" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
							<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Actividad Reciente</a></li>
							<li role="presentation" class=""><a href="#tab_content2" id="profile-tab" role="tab" data-toggle="tab" aria-expanded="true">Contácto</a></li>
							<li role="presentation" class=""><a href="#tab_content3" id="profile-tab2" role="tab" data-toggle="tab" aria-expanded="true">Configuraciones</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
							<p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                              photo booth letterpress, commodo enim craft beer mlkshk </p>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
								<!-- start panel contacts -->
								<h4 class="heading"><i class="fa fa-phone"></i><span> Contácto</span></h4>
								<p>
									Teléfonos	: <?php echo $this->request->data['Persona']['nums_telefono']; ?> <br>
								</p>
								<p>
									Email		: j<?php echo AuthComponent::user('email'); ?>
								</p>
								<h4 class="heading"><i class="fa fa-map-marker"></i><span> Localización</span></h4>
								<p>
									Departamento	: Alta Verapaz <br>
									Municipio		: Cobán 
								</p>
								<p>
									Dirección		: <?php echo $this->request->data['Persona']['dir_residencia']; ?>
								</p>
								<!-- end panel contacts -->
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
								<!-- start panel settings -->
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
								echo $this->Form->input('id_establecimiento', array('label' => array('text'=> 'Establecimiento'), 'type' => 'select', 'options' => $establecimiento));
								?>
								<div class="form-group col-sm-6 col-lg-3 col-xs-12">
									<label for="PersonaPrimerNombre">Puesto</label>
									<div class="controls">
										<input name="data[Persona][id_puesto]" class="form-control" readonly value="<?php echo $this->request->data['Puesto']['nom_puesto']; ?>" id="PersonaPrimerNombre">
									</div>
								</div>
								<?php
								echo '</div>';
								$options = array('label' => 'Editar', 'class' => 'btn btn-success', 'div' => false, 'escape' => false );
								echo '<div class="ln_solid"></div>';
								echo $this->Form->end($options); ?>
								<!-- end panel settings -->
							</div>
						</div> <!-- /.tab-content-->
					</div> <!-- /.tab-panel-->
				</div> <!-- /.profile-right -->
			</div> <!-- /.x-content -->
		</div><!-- /.x-panel -->
	</div>  <!-- /.col -->
</div><!-- /.row -->
<?php $this->Js->buffer("
	var d = ($('#PersonaFecNacimiento').val()).split('-');
	$('#PersonaFecNacimiento').val(d[2]+'/'+d[1]+'/'+d[0]);
	 $('#PersonaPerfilForm').bootstrapValidator({
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