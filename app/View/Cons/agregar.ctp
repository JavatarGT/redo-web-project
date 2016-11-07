<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<?php echo $this->Html->link(__('<i class="fa fa-backward"></i> Atrás'), array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
			<div class="ln_solid"></div>
			<div class="x_content">
				<?php echo $this->Form->create('Cons', array(
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
				echo $this->Form->input('fecha_solicitud', array('label' => array('text'=> 'Fecha para Solicitud'), 'type' =>  'text'));
				echo '</div>';
				$options = array('label' => 'Agregar', 'class' => 'btn btn-success', 'div' => false, 'escape' => false );
				echo '<div class="ln_solid"></div>';
				echo $this->Form->end($options); ?>
			</div> <!-- /.x-content -->
		</div><!-- /.x-panel -->
	</div>	<!-- /.col -->
</div><!-- /.row -->


<?php $this->Js->buffer("
	 $('#ConsAgregarForm').bootstrapValidator({
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
			\"data[Cons][fecha_solicitud]\": {
				validators: {
					notEmpty: {
						message: 'Es necesario que ingrese un nombre de Puesto escolar'
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

	$('#ConsFechaSolicitud').daterangepicker(optionSet1, function(start, end, label) {});

	$('#ConsFechaSolicitud').inputmask('99/99/9999');
");
?>
