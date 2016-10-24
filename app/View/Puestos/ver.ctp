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
						<td><?php echo __('ID de Puesto'); ?></td>
						<td><?php echo h(str_pad($puesto['Puesto']['id'], 7, "0", STR_PAD_LEFT)); ?>&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Nombre de Puesto'); ?></td>
						<td><?php echo h($puesto['Puesto']['nombre']); ?>&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Descripción'); ?></td>
						<td><?php echo h($puesto['Puesto']['desc_puesto']); ?>&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Estado Activo'); ?></td>
						<td><?php echo h($puesto['Puesto']['estado_activo'] == 1 ? 'Sí' : 'No'); ?>&nbsp;</td>
					</tr>
					</tbody>
				</table>
			</div><!-- /.x-content -->
		</div><!-- /.x-panel -->
	</div>	<!-- /.col -->
</div><!-- /.row -->