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
						<td><?php echo __('ID de Programa'); ?></td>
						<td><?php echo h(str_pad($programa['Programa']['id'], 7, "0", STR_PAD_LEFT)); ?>&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Nombre de Programa'); ?></td>
						<td><?php echo h($programa['Programa']['nombre']); ?>&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Descripción'); ?></td>
						<td><?php echo h($programa['Programa']['descripcion']); ?>&nbsp;</td>
					</tr>
					</tbody>
				</table>
			</div><!-- /.x-content -->
		</div><!-- /.x-panel -->
	</div>	<!-- /.col -->
</div><!-- /.row -->