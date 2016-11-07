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
						<td><?php echo __('ID de Establecimiento'); ?></td>
						<td><?php echo h(str_pad($establecimiento['Establecimiento']['id'], 4, "0", STR_PAD_LEFT)); ?>&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Nombre de Establecimiento'); ?></td>
						<td><?php echo h($establecimiento['Establecimiento']['nombre']); ?>&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Departamento ubicación'); ?></td>
						<td><?php echo h($establecimiento['Departamento']['nombre']); ?>&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Municipio ubicación'); ?></td>
						<td><?php echo h($establecimiento['Municipio']['nombre']); ?>&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Observaciones'); ?></td>
						<td><?php echo h($establecimiento['Establecimiento']['observaciones']); ?>&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Estado Activo'); ?></td>
						<td><?php echo h($establecimiento['Establecimiento']['estado_activo']); ?>&nbsp;</td>
					</tr>
					</tbody>
				</table>
			</div><!-- /.x-content -->
		</div><!-- /.x-panel -->
	</div>	<!-- /.col -->
</div><!-- /.row -->