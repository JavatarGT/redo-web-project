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
							<td><?php echo __('Código de Desembolso'); ?></td>
							<td><?php echo h(str_pad($desembolso['Desembolso']['id'], 4, "0", STR_PAD_LEFT)); ?></td>
						</tr>
						<tr>
							<td><?php echo __('Programa'); ?></td>
							<td><?php echo h($desembolso['EstablecimientoPrograma']['Programa']['nombre']); ?></td>
						</tr>
						<tr>
							<td><?php echo __('Nombre del Banco'); ?></td>
							<td><?php echo h($desembolso['Desembolso']['nombre_banco']); ?></td>
						</tr>
						<tr>
							<td><?php echo __('No. de Cheque'); ?></td>
							<td><?php echo h($desembolso['Desembolso']['no_cheque']); ?></td>
						</tr>
						<tr>
							<td><?php echo __('Cantidad'); ?></td>
							<td><?php echo h($desembolso['Desembolso']['cantidad']); ?></td>
						</tr>
						<tr>
							<td><?php echo __('Fecha'); ?></td>
							<td><?php echo h(date('d/m/Y', strtotime($desembolso['Desembolso']['fecha']))); ?></td>
						</tr>
						<tr>
							<td><?php echo __('Persona Firma 1'); ?></td>
							<td><?php echo h($desembolso['Persona1']['nombre_completo']); ?></td>
						</tr>
						<tr>
							<td><?php echo __('Persona Firma 2'); ?></td>
							<td><?php if(array_key_exists('Persona2', $desembolso)) echo h($desembolso['Persona2']['nombre_completo']); ?></td>
						</tr>
						<tr>
							<td><?php echo __('Observaciones'); ?></td>
							<td><?php echo h($desembolso['Desembolso']['observaciones']); ?></td>
						</tr>
					</tbody>
				</table>
			</div><!-- /.x-content -->
		</div><!-- /.x-panel -->
	</div>	<!-- /.col -->
</div><!-- /.row -->