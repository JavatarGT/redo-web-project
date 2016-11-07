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
							<th>Usuario</th>
							<th>Grupo</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($users as $user): ?>
						<tr>
							<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
							<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
							<td><?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?></td>
							<td><?php echo $this->Html->link(__('<i class="fa fa-folder"></i> Ver'), array('action' => 'ver', $user['User']['id']), array('class' => 'btn btn-round btn-primary', 'escape' => false));
								echo '&nbsp;';
								echo $this->Html->link(__('<i class="fa fa-edit"></i> Editar'), array('action' => 'editar', $user['User']['id']), array('class' => 'btn btn-round btn-info', 'escape' => false)); 
								?>
								<!-- <button class="btn btn-danger" role="button" onclick="delRegister(<?php echo $user['User']['id'] ?>)"><i class="fa fa-trash"></i></button> -->
							</td>
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
		fixedHeader: true,
		language: {
            url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json'
        }
	});
	");
?>