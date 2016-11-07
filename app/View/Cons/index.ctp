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
							<th>Persona</th>
							<th>Fecha de Creacion</th>
							<th>Fecha de Solicitud</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($solicitudes as $reg): ?>
						<tr>
							<td><?php echo str_pad($reg['Cons']['id'], 7, "0", STR_PAD_LEFT); ?>&nbsp;</td>
							<td><?php echo h($reg['Persona']['nombre_completo']); ?>&nbsp;</td>
							<td><?php echo h(date('d/m/Y', strtotime($reg['Cons']['fecha_creacion']))); ?>&nbsp;</td>
							<td><?php echo h(date('d/m/Y', strtotime($reg['Cons']['fecha_solicitud']))); ?>&nbsp;</td>
							<td><?php switch($reg['Cons']['estado_activo']){
								case 1: echo h('Solicitud Iniciada'); break;
								case 2: echo h('Solicitud Confirmada'); break;
								case 3: echo h('Solicitud Rechazada'); break;
							}?>&nbsp;</td>
							<td><?php
								echo $this->Html->link(__('<i class="fa fa-folder"></i> Ver'), array('action' => 'ver', $reg['Cons']['id']), array('class' => 'btn btn-round btn-primary', 'escape' => false));
								if(AuthComponent::user('group_id') == 1 && $reg['Cons']['estado_activo']==1){ ?>
									&nbsp;
									<a class="btn btn-round btn-info" onclick="confirmar(<?php echo $reg['Cons']['id'] ?>)"><i class="fa fa-check"></i> Confirmar</a>
									&nbsp;'
									<a class="btn btn-round btn-danger" onclick="rechazar(<?php echo $reg['Cons']['id'] ?>)"><i class="fa fa-remove"></i> Rechazar</a>
								<?php
								}
								if($reg['Cons']['estado_activo']==2){
									echo '&nbsp;';
									echo $this->Html->link(__('<i class="fa fa-print"></i> Imprimir Solicitud'), array('action' => 'doc', $reg['Cons']['id']), array('class' => 'btn btn-round btn-success', 'escape' => false, 'target' => '_blank'));
								}
								?></td>
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
			<form action="<?php echo $this->webroot; ?>cons/confirmar" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel">Confirmar solicitud de ingreso</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" name="idcons" id="idcons">
					<p>
						¿Está seguro que desea confirmar la solicitud de ingreso?
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
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="mdl1" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form action="<?php echo $this->webroot; ?>cons/rechazar" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel">Rechazar solicitud de ingreso</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" name="idcons" id="idcons">
					<p>
						¿Está seguro que desea rechazar la solicitud de ingreso?
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Rechazar</button>
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
	");
?>
<script type="text/javascript">
	function confirmar(id){
		$('#idcons').val(id);
		$('#mdl').modal('show');
	}
	function rechazar(id){
		$('#idcons').val(id);
		$('#mdl1').modal('show');
	}
</script>