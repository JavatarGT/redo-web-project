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
							<th>CUI</th>
							<th>Nombres Completos</th>
							<th>Direccion</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($personas as $reg): ?>
							<tr>
								<td><?php echo str_pad($reg['Persona']['id'], 4, "0", STR_PAD_LEFT); ?>&nbsp;</td>
								<td><?php echo h($reg['Persona']['cui']); ?>&nbsp;</td>
								<td><?php echo h($reg['Persona']['nombre_completo']); ?>&nbsp;</td>
								<td><?php echo h($reg['Persona']['dir_residencia']); ?>&nbsp;</td>
								<td><?php echo $this->Html->link(__('<i class="fa fa-folder"></i> Ver'), array('action' => 'ver', $reg['Persona']['id']), array('class' => 'btn btn-round btn-primary', 'escape' => false));
									echo '&nbsp;';
									echo $this->Html->link(__('<i class="fa fa-edit"></i> Editar'), array('action' => 'editar', $reg['Persona']['id']), array('class' => 'btn btn-round btn-info', 'escape' => false)); ?></td>
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