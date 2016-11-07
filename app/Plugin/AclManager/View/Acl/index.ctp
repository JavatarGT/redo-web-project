<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="row">
		<div class="col-xs-12 col-md-12">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<h3>Permisos de Grupo de Usuarios</h3>
				<p></p>
				<p>Nota: Para actualizar las vistas, debe actualizar ACOs.</p>
				<p>&nbsp;</p>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<h3><?php echo __('Acciones'); ?></h3>

				<div class="clearfix" style="text-align:left;">
                    
                    	<?php echo $this->Html->link(__('<i class="fa fa-check-square-o"></i> Administrar Permisos'), array('action' => 'permissions'), array('class' => 'btn btn-primary btn-block', 'escape' => false)); ?>
						<?php echo $this->Html->link(__('<i class="fa fa-refresh"></i> Actualizar ACOs'), array('action' => 'update_acos'), array('class' => 'btn btn-success btn-block', 'escape' => false)); ?>
						<?php echo $this->Html->link(__('<i class="fa fa-refresh"></i> Actualizar AROs'), array('action' => 'update_aros'), array('class' => 'btn btn-success btn-block', 'escape' => false)); ?>

						<?php echo $this->Html->link(__('<i class="fa fa-close"></i> Eliminar Reglas'), array('action' => 'drop'), array('class' => 'btn btn-danger btn-block', 'escape' => false), __("¿Desea eliminar las reglas de vistas?")); ?>

						<?php echo $this->Html->link(__('<i class="fa fa-close"></i> Eliminar Permisos'), array('action' => 'drop_perms'), array('class' => 'btn btn-danger btn-block', 'escape' => false), __("¿Desea eliminar los permisos de usuarios?")); ?>
                </div>
			</div>
		</div>
	</div>
	<br><br><br>
</div>

