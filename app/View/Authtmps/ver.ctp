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
						<td><?php echo __('Primer Nombre'); ?></td>
						<td><?php echo h($authtmp['Authtmp']['primer_nombre']); ?>&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Primer Apellido'); ?></td>
						<td><?php echo h($authtmp['Authtmp']['primer_apellido']); ?>&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Usuario'); ?></td>
						<td><?php echo h($authtmp['Authtmp']['username']); ?>&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Email'); ?></td>
						<td><?php echo h($authtmp['Authtmp']['email']); ?>&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Establecimiento'); ?></td>
						<td><?php echo h($authtmp['Establecimiento']['nombre']); ?>&nbsp;</td>
					</tr>
					</tbody>
				</table>
			</div><!-- /.x-content -->
		</div><!-- /.x-panel -->
	</div>	<!-- /.col -->
</div><!-- /.row -->