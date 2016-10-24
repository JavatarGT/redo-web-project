<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<?php echo $this->Html->link(__('<i class="fa fa-backward"></i> Atrás'), array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
			<div class="ln_solid"></div>
			<div class="x_content">
				<?php echo $this->Form->create('Desembolso', array(
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
				echo '<div class="row">';
				echo $this->Form->input('nombre_banco', array('label' => array('text'=> 'Nombre del Banco')));
				echo $this->Form->input('no_cheque', array('label' => array('text'=> 'No. Cheque')));
				echo $this->Form->input('cantidad', array('label' => array('text'=> 'Cantidad Q.'), 'type' => 'text'));
				echo $this->Form->input('fecha', array('label' => array('text'=> 'Fecha de Desembolso'), 'type' => 'text'));
				echo '</div>';
				echo '<div class="row">';
				echo $this->Form->input('persona_firma1', array('label' => array('text'=> 'Persona firma 1'), 'options' => $personas));
				$per = array('' => '--');
				array_push($per, $personas);
				echo $this->Form->input('persona_firma2', array('label' => array('text'=> 'Persona firma 2'), 'options' => $per));
				echo $this->Form->input('observaciones', array('label' => array('text'=> 'Observaciones'), 'type' => 'textarea', 'rows' => 3));
				echo '</div>';
				$options = array('label' => 'Agregar', 'class' => 'btn btn-success', 'div' => false, 'escape' => false );
				echo '<div class="ln_solid"></div>';
				echo $this->Form->end($options); ?>
			</div> <!-- /.x-content -->
		</div><!-- /.x-panel -->
	</div>  <!-- /.col -->
</div><!-- /.row -->


<?php $this->Js->buffer("
	 $('#DesembolsoAgregarForm').bootstrapValidator({
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
			\"data[Desembolso][nombre_banco]\": {
				validators: {
					notEmpty: {
						message: 'Es necesario que ingrese un nombre de banco'
					}
				}
			},
			\"data[Desembolso][no_cheque]\": {
				validators: {
					notEmpty: {
						message: 'Es necesario que ingrese un número de cheque'
					}
				}
			},
			\"data[Desembolso][cantidad]\": {
				validators: {
					notEmpty: {
						message: 'Es necesario que ingrese una cantidad'
					}
				}
			},
			\"data[Desembolso][persona_firma1]\": {
				validators: {
					notEmpty: {
						message: 'Es necesario que indique una persona para firma 1'
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

	$('#DesembolsoFecha').daterangepicker(optionSet1, function(start, end, label) {});

	$('#DesembolsoFecha').inputmask('99/99/9999');
");
?>
