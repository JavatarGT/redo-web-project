<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<?php echo $this->Html->link(__('<i class="fa fa-backward"></i> Atrás'), array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
			<div class="ln_solid"></div>
			<div class="x_content">
				<?php echo $this->Form->create('Tiposangre', array(
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
				echo $this->Form->hidden('id');
				echo '<div class="row">';
				echo $this->Form->input('nombre', array('label' => array('text'=> 'Nombre de Tipo de Sangre'), 'type' =>  'text'));
				echo '</div>';
				$options = array('label' => 'Editar', 'class' => 'btn btn-success', 'div' => false, 'escape' => false );
				echo '<div class="ln_solid"></div>';
				echo $this->Form->end($options); ?>
			</div> <!-- /.x-content -->
		</div><!-- /.x-panel -->
	</div>	<!-- /.col -->
</div><!-- /.row -->


<?php $this->Js->buffer("
	 $('#TiposangreEditarForm').bootstrapValidator({
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
			\"data[Tiposangre][nombre]\": {
				validators: {
					notEmpty: {
						message: 'Es necesario que ingrese un nombre de tipo de sangre'
					}
				}
			}
		}
	});
");
?>