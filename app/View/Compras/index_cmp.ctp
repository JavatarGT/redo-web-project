<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<?php echo $this->Html->link(__('<i class="fa fa-backward"></i> Atrás'), array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
			<?php echo $this->Html->link(__('<i class="fa fa-plus"></i> Nuevo'), array('action' => 'agregar', $iddesembolso), array('class' => 'btn btn-success', 'escape' => false)); ?>
			<div class="ln_solid"></div>
			<div class="x_content">
				<table id="datatable" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Id</th>
							<th>Descripcion</th>
							<th>Fecha de Inicio</th>
							<th>Fecha de Finalización</th>
							<th>Monto Total Q.</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($compras as $reg):
								// $this->EstablecimientoCompra = ClassRegistry::init('EstablecimientoCompra');
								// $establ = $this->EstablecimientoCompra->find('first', array(
								// 	'conditions'=>array('EstablecimientoCompra.id'=>$reg['Compra']['id_establecimiento_Compra']),
								// 	'recursive'=>0
								// 	)
								// );
						?>
							<tr>
								<td><?php echo str_pad($reg['Compra']['id_compra'], 4, "0", STR_PAD_LEFT); ?>&nbsp;</td>
								<td><?php echo h($reg['Compra']['descripcion']); ?>&nbsp;</td>
								<td><?php echo h(date('d/m/Y', strtotime($reg['Compra']['fecha_inicio']))); ?>&nbsp;</td>
								<td><?php echo h(date('d/m/Y', strtotime($reg['Compra']['fecha_fin']))); ?>&nbsp;</td>
								<td><?php echo h($reg['Compra']['monto_total']); ?>&nbsp;</td>
								<td><?php echo $this->Html->link(__('<i class="fa fa-folder"></i> Ver'), array('action' => 'ver_cmp', $reg['Compra']['id_compra'], $iddesembolso), array('class' => 'btn btn-round btn-primary', 'escape' => false));
								 ?></td>
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