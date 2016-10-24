<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<?php echo $this->Html->link(__('<i class="fa fa-plus"></i> Nuevo'), array('action' => 'agregar'), array('class' => 'btn btn-success', 'escape' => false)); ?>
			<div class="ln_solid"></div>
			<div class="x_content">
				<table id="datatable" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Id</th>
							<th>Programa</th>
							<th>Cantidad</th>
							<th>Banco</th>
							<th>Fecha</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($desembolsos as $reg): ?>
							<tr>
								<td><?php echo str_pad($reg['Desembolso']['id'], 4, "0", STR_PAD_LEFT); ?>&nbsp;</td>
								<td><?php echo h($reg['Desembolso']['id']); ?>&nbsp;</td>
								<td><?php echo h($reg['Desembolso']['cantidad']); ?>&nbsp;</td>
								<td><?php echo h($reg['Desembolso']['nombre_banco']); ?>&nbsp;</td>
								<td><?php echo h($reg['Desembolso']['fecha']); ?>&nbsp;</td>
								<td><?php echo $this->Html->link(__('<i class="fa fa-folder"></i> Ver'), array('action' => 'ver', $reg['Desembolso']['id']), array('class' => 'btn btn-round btn-primary', 'escape' => false)); ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table><!-- /.data-table -->
			</div><!-- /.x-content -->
		</div><!-- /.x-panel -->
	</div>	<!-- /.col -->
</div><!-- /.row -->
<?php $this->Js->buffer("
	$('#datatable').DataTable({
		fixedHeader: true
	});
	");
?>