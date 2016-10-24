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
							<td><?php echo __('Creado'); ?></td>
							<td><?php echo h($user['User']['created']); ?></td>
						</tr>
						<tr>
							<td><?php echo __('Modificado'); ?></td>
							<td><?php echo h($user['User']['modified']); ?></td>
						</tr>
						<tr>
							<td><?php echo __('Nombre de usuario'); ?></td>
							<td><?php echo h($user['User']['username']); ?></td>
						</tr>
						<tr>
						<td><?php echo __('Grupo'); ?></td>
						<td><?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?></td>
						</tr>
						<tr>
							<td><?php echo __('Correo Electrónico'); ?></td>
							<td><?php echo h($user['User']['email']); ?></td>
						</tr>
					</tbody>
				</table>
			</div><!-- /.x-content -->
		</div><!-- /.x-panel -->
	</div>	<!-- /.col -->
</div><!-- /.row -->