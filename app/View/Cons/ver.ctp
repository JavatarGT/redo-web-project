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
						<td><?php echo h(str_pad($solicitud['Cons']['id'], 7, "0", STR_PAD_LEFT)); ?>&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Solicitante'); ?></td>
						<td><?php echo h($solicitud['Persona']['nombre_completo']); ?>&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Identificación CUI'); ?></td>
						<td><?php echo h($solicitud['Persona']['cui']); ?>&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Contrato MINEDUC'); ?></td>
						<td><?php echo h($solicitud['Persona']['reglon']); ?>&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Establecimiento'); ?></td>
						<td><?php echo h($solicitud['Persona']['Establecimiento']['nombre']); ?>&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Ingreso Mensual Q.'); ?></td>
						<td><?php echo h($solicitud['Persona']['salario']); ?>&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Escalafón Mensual Q.'); ?></td>
						<td><?php echo h($solicitud['Persona']['escalafon_mensual']); ?>&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Bono Bilingüismo Q.'); ?></td>
						<td><?php echo h($solicitud['Persona']['bono_bilinguismo']); ?>&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Estado de Solicitud'); ?></td>
						<td><?php switch($solicitud['Cons']['estado_activo']){
								case 1: echo h('Solicitud Iniciada'); break;
								case 2: echo h('Solicitud Confirmada'); break;
								case 3: echo h('Solicitud Rechazada'); break;
							} ?>&nbsp;</td>
					</tr>
					</tbody>
				</table>
			</div><!-- /.x-content -->
		</div><!-- /.x-panel -->
	</div>	<!-- /.col -->
</div><!-- /.row -->