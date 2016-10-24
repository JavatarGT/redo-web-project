<div class="clearfix"></div>
<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel">
			<?php echo $this->Html->link(__('<i class="fa fa-backward"></i> Atrás'), array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
			<div class="ln_solid"></div>
			<div class="x_content">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td><?php echo __('Código de Persona'); ?></td>
							<td><?php echo h(str_pad($persona['Persona']['id'], 4, "0", STR_PAD_LEFT)); ?></td>
						</tr>
						<tr>
							<td><?php echo __('CUI'); ?></td>
							<td><?php echo h($persona['Persona']['cui']); ?></td>
						</tr>
						<tr>
							<td><?php echo __('NIT'); ?></td>
							<td><?php echo h($persona['Persona']['nit']); ?></td>
						</tr>
						<tr>
							<td><?php echo __('Nombre completo'); ?></td>
							<td><?php echo h($persona['Persona']['nombre_completo']); ?></td>
						</tr>
						<tr>
							<td><?php echo __('Estado Civil'); ?></td>
							<td><?php echo h($persona['Persona']['estado_civil']); ?></td>
						</tr>
						<tr>
							<td><?php echo __('Dirección'); ?></td>
							<td><?php echo h($persona['Persona']['dir_residencia']); ?></td>
						</tr>
						<tr>
							<td><?php echo __('Teléfonos de contácto'); ?></td>
							<td><?php echo h($persona['Persona']['nums_telefono']); ?></td>
						</tr>
						<tr>
							<td><?php echo __('Género'); ?></td>
							<td><?php echo h($persona['Persona']['genero']); ?></td>
						</tr>
						<tr>
							<td><?php echo __('Fecha de Nacimiento'); ?></td>
							<td><?php echo h(date('d/m/Y', strtotime($persona['Persona']['fec_nacimiento']))); ?></td>
						</tr>
						<tr>
							<td><?php echo __('Lugar de nacimiento'); ?></td>
							<td><?php echo h($persona['Persona']['lug_nacimiento']); ?></td>
						</tr>
						<tr>
							<td><?php echo __('Usuario actualizó'); ?></td>
							<td><?php echo h($persona['Persona']['usr_actualizacion']); ?></td>
						</tr>
						<tr>
							<td><?php echo __('Fec. Modificado'); ?></td>
							<td><?php echo h($persona['Persona']['fec_actualizacion']); ?></td>
						</tr>
					</tbody>
				</table>
			</div><!-- /.x-content -->
		</div><!-- /.x-panel -->
	</div>	<!-- /.col -->
</div><!-- /.row -->