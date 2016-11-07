<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	<div class="menu_section">
		<h3>ADMINISTRACIÓN</h3>
		<ul class="nav side-menu">
			<!-- <li><a><i class="fa fa-home"></i> Inicio <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li><a href="#">Dashboard</a></li>
				</ul>
			</li> -->
			
			<li class="<?php if($this->params->controller == 'establecimientos' || $this->params->controller == 'tiposangres' || $this->params->controller == 'personas' || $this->params->controller == 'programas' || $this->params->controller == 'puestos') echo 'active'; ?>">

				<a><i class="fa fa-edit"></i> Catálogos <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu" <?php if($this->params->controller == 'establecimientos' || $this->params->controller == 'tiposangres' || $this->params->controller == 'personas' || $this->params->controller == 'puestos') echo ' style="display:block;"';  ?>>
					<li class="<?php if($this->params->controller == 'programas' && ($this->params->action == 'index' || $this->params->action == 'agregar' || $this->params->action == 'editar' || $this->params->action == 'ver')) echo 'current-page';  ?>">
						<?php echo $this->Html->link('Programas Escolares',array('plugin' => null, 'controller' => 'programas','action' => 'index'), array('escape' => false)); ?>

					</li>
					<li class="<?php if($this->params->controller == 'establecimientos' && ($this->params->action == 'index' || $this->params->action == 'agregar' || $this->params->action == 'editar' || $this->params->action == 'ver')) echo 'current-page';  ?>">
						<?php echo $this->Html->link('Establecimientos',array('plugin' => null, 'controller' => 'establecimientos','action' => 'index'), array('escape' => false)); ?>
					</li>
					<li class="<?php if($this->params->controller == 'personas' && ($this->params->action == 'index' || $this->params->action == 'agregar' || $this->params->action == 'editar' || $this->params->action == 'ver')) echo 'current-page';  ?>">
						<?php echo $this->Html->link('Personas',array('plugin' => null, 'controller' => 'personas','action' => 'index'), array('escape' => false)); ?>
					</li>
					<li class="<?php if($this->params->controller == 'puestos' && ($this->params->action == 'index' || $this->params->action == 'agregar' || $this->params->action == 'editar' || $this->params->action == 'ver')) echo 'current-page';  ?>">
						<?php echo $this->Html->link('Puestos',array('plugin' => null, 'controller' => 'puestos','action' => 'index'), array('escape' => false)); ?>
					</li>
					<li class="<?php if($this->params->controller == 'tiposangres' && ($this->params->action == 'index' || $this->params->action == 'agregar' || $this->params->action == 'editar' || $this->params->action == 'ver')) echo 'current-page';  ?>">
						<?php echo $this->Html->link('Tipos de Sangre',array('plugin' => null, 'controller' => 'tiposangres','action' => 'index'), array('escape' => false)); ?>
					</li>
					
				</ul>
			</li>
			
			<?php 
				$this->Persona = ClassRegistry::init('Persona');
				$persona = $this->Persona->find('first', array(
					'conditions' => array(
						'Persona.id' => AuthComponent::user('id_persona'),
						'Persona.id_puesto' => 1
						),
					'recursive' => -1
					)
				);
				?>
					<li class="<?php if($this->params->controller == 'mie' || $this->params->controller == 'compras') echo 'active'; ?>">
						<a><i class="fa fa-list-alt"></i> Mi Establecimiento <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu" <?php if($this->params->controller == 'mie' || $this->params->controller == 'compras' || $this->params->controller == 'cons') echo ' style="display:block;"';  ?>>
						<?php if(array_key_exists('Persona', $persona)){ ?>
							<li class="<?php if($this->params->controller == 'mie' && ($this->params->action == 'editar')) echo 'active';  ?>">
								<?php echo $this->Html->link('Información',array('plugin' => null, 'controller' => 'mie','action' => 'editar'), array('escape' => false)); ?>
							</li>
							<li class="<?php if($this->params->controller == 'mie' && ($this->params->action == 'index' || $this->params->action == 'agregar' || $this->params->action == 'ver')) echo 'active';  ?>">
								<?php echo $this->Html->link('Desembolsos',array('plugin' => null, 'controller' => 'mie','action' => 'index'), array('escape' => false)); ?>
							</li>
							<li class="<?php if($this->params->controller == 'compras' && ($this->params->action == 'index' || $this->params->action == 'agregar' || $this->params->action == 'editar' || $this->params->action == 'ver' || $this->params->action == 'index_cmp' || $this->params->action == 'ver_cmp')) echo 'active';  ?>">
								<?php echo $this->Html->link('Compras',array('plugin' => null, 'controller' => 'compras','action' => 'index'), array('escape' => false)); ?>
							</li>
						<?php } ?>
						<li class="<?php if($this->params->controller == 'cons' && ($this->params->action == 'index' || $this->params->action == 'agregar' || $this->params->action == 'ver')) echo 'active';  ?>">
								<?php echo $this->Html->link('Constancia de Ingresos',array('plugin' => null, 'controller' => 'cons','action' => 'index'), array('escape' => false)); ?>
							</li>
						</ul>
					</li>
			<li class="<?php if($this->params->controller == 'users' || $this->params->plugin == 'acl_manager' || $this->params->controller == 'groups' || $this->params->controller == 'authtmps') echo 'active'; ?>">
				<a><i class="fa fa-user-secret"></i> Seguridad <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu" <?php if($this->params->controller == 'users' || $this->params->plugin == 'acl_manager' || $this->params->controller == 'groups' || $this->params->controller == 'authtmps') echo ' style="display:block;"';  ?>>
					<li class="<?php echo $this->params->plugin == 'acl_manager' ? 'active' : '';  ?>">
						<?php echo $this->Html->link('Permisos ',array('plugin' => null, 'controller' => 'acl_manager','action' => 'acl'), array('escape' => false)); ?>
					</li>
					<li class="<?php if($this->params->controller == 'users' && ($this->params->action == 'index' || $this->params->action == 'agregar' || $this->params->action == 'editar' || $this->params->action == 'ver')) echo 'current-page';  ?>">
						<?php echo $this->Html->link('Usuarios',array('plugin' => null, 'controller' => 'users','action' => 'index'), array('escape' => false)); ?>
					</li>
					<li class="<?php if($this->params->controller == 'groups' && ($this->params->action == 'index' || $this->params->action == 'agregar' || $this->params->action == 'editar' || $this->params->action == 'ver')) echo 'current-page';  ?>">
						<?php echo $this->Html->link('Grupos',array('plugin' => null, 'controller' => 'groups','action' => 'index'), array('escape' => false)); ?>
					</li>
					<li class="<?php if($this->params->controller == 'authtmps' && ($this->params->action == 'index' || $this->params->action == 'ver')) echo 'current-page';  ?>">
						<?php echo $this->Html->link('Nuevos usuarios',array('plugin' => null, 'controller' => 'authtmps', 'action' => 'index'), array('escape' => false)); ?>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</div>
<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
	<a data-toggle="tooltip" data-placement="top" title="Settings">
		<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
	</a>
	<a data-toggle="tooltip" data-placement="top" title="FullScreen">
		<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
	</a>
	<a data-toggle="tooltip" data-placement="top" title="Lock">
		<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
	</a>
	<a data-toggle="tooltip" data-placement="top" title="Cerrar Sesión" href="<?php echo $this->webroot; ?> users/logout">
		<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
	</a>
</div>
<!-- /menu footer buttons -->