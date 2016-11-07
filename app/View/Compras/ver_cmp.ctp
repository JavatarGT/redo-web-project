<div class="clearfix"></div>
<div class="row">
	<div class="col-md-8 col-sm-8 col-xs-12">
		<div class="x_panel">
			<?php echo $this->Html->link(__('<i class="fa fa-backward"></i> Atrás'), array('action' => 'index_cmp', $iddesembolso), array('class' => 'btn btn-primary', 'escape' => false)); ?>
			<div class="ln_solid"></div>
			<div class="x_content">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td><?php echo __('Código de Compra'); ?></td>
							<td><?php echo h(str_pad($compra['Compra']['id_compra'], 7, "0", STR_PAD_LEFT)); ?></td>
						</tr>
						<tr>
							<td><?php echo __('Observaciones'); ?></td>
							<td><?php echo h($compra['Compra']['descripcion']); ?></td>
						</tr>
						<tr>
							<td><?php echo __('Fecha de Inicio'); ?></td>
							<td><?php echo h(date('d/m/Y', strtotime($compra['Compra']['fecha_inicio']))); ?></td>
						</tr>
						<tr>
							<td><?php echo __('Fecha de Fin'); ?></td>
							<td><?php echo h(date('d/m/Y', strtotime($compra['Compra']['fecha_fin']))); ?></td>
						</tr>
						<tr>
							<td><?php echo __('Monto Total Q.'); ?></td>
							<td><?php echo h($compra['Compra']['monto_total']); ?></td>
						</tr>
					</tbody>
				</table>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Tipo de Documento</th>
							<th>Descripción de Gasto</th>
							<th>No. de Factura</th>
							<th>Serie</th>
							<th>Fecha de Factura</th>
							<th>Sub-Total</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($compra['DetCompra'] as $key => $value) { ?>
						<tr>
							<td><?php echo $value['tipo_doc_gasto']; ?></td>
							<td><?php echo $value['desc_gasto']; ?></td>
							<td><?php echo $value['no_factura']; ?></td>
							<td><?php echo $value['serie_factura']; ?></td>
							<td><?php echo $value['fecha_factura']; ?></td>
							<td><?php echo $value['monto_detalle']; ?></td>
						</tr>
					<?php }  ?>
					</tbody>
				</table>
			</div><!-- /.x-content -->
		</div><!-- /.x-panel -->
	</div>	<!-- /.col -->
</div><!-- /.row -->