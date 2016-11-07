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
							<th>Primer Nombre</th>
							<th>Primer Apellido</th>
							<th>Email</th>
							<th>Usuario</th>
							<th>Establecimiento</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($authtmps as $reg): ?>
						<tr>
							<td><?php echo h($reg['Authtmp']['primer_nombre']); ?>&nbsp;</td>
							<td><?php echo h($reg['Authtmp']['primer_apellido']); ?>&nbsp;</td>
							<td><?php echo h($reg['Authtmp']['email']); ?>&nbsp;</td>
							<td><?php echo h($reg['Authtmp']['username']); ?>&nbsp;</td>
							<td><?php echo h($reg['Establecimiento']['nombre']); ?>&nbsp;</td>
							<td><?php
								echo $this->Html->link(__('<i class="fa fa-folder"></i> Ver'), array('action' => 'ver', $reg['Authtmp']['id']), array('class' => 'btn btn-round btn-primary', 'escape' => false));
								echo '&nbsp;'; 
								// echo $this->Html->link(__('<i class="fa fa-edit"></i> Editar'), array('action' => 'editar', $reg['Authtmp']['id']), array('class' => 'btn btn-round btn-info', 'escape' => false));
								?>
								<a class="btn btn-round btn-success" onclick="confirmar(<?php echo $reg['Authtmp']['id'] ?>)"><i class="fa fa-check"></i> Confirmar</a>
								<?php 
								echo '&nbsp;';
								echo $this->Html->link(__('<i class="fa fa-remove"></i> Eliminar'), array('action' => 'eliminar', $reg['Authtmp']['id']), array('class' => 'btn btn-round btn-danger', 'escape' => false)); ?>
								</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table><!-- /.data-table -->
			</div><!-- /.x-content -->
		</div><!-- /.x-panel -->
	</div>	<!-- /.col -->
</div><!-- /.row -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="mdl" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form action="<?php echo $this->webroot; ?>authtmps/confirmar" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel">Confirmar usuario nuevo</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" name="idnusuario" id="idnusuario">
					<p>
						¿Está seguro que desea confirmar al usuario?
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Confirmar</button>
				</div>
			</form>
			
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php $this->Js->buffer("
	$('#datatable').DataTable({
		fixedHeader: true,
		language: {
            url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json'
        }
	});
	");
?>
<script type="text/javascript">
	function confirmar(id){
		$('#idnusuario').val(id);
		$('#mdl').modal('show');
	}
</script>