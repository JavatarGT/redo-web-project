<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="row">
		<div class="col-xs-12 col-md-12">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<legend><?php echo sprintf(__("Permisos de %s"), $titulo); ?></legend>
				<?php echo $this->Form->create('Perms'); ?>
				<table class="table table-hover table-striped table-bordered">
						<?php

						$tabs = "";
						$grupos = "<tr><th>Acciones</th>";
						$tab_content="";
						$tab_aux = "";

						foreach ($aros as $aro){ 
							$aro = array_shift($aro);
						 	$grupos = $grupos . '<th>'. h($aro[$aroDisplayField]) .'</th>';  
						} 

						$grupos= $grupos.'</tr>';
						echo $grupos;

				$uglyIdent = Configure::read('AclManager.uglyIdent'); 
				$lastIdent = null;
				foreach ($acos as $id => $aco) {
					$action = $aco['Action'];
					$alias = $aco['Aco']['alias'];
					$ident = substr_count($action, '/');
					if ($ident <= $lastIdent && !is_null($lastIdent)) {
						for ($i = 0; $i <= ($lastIdent - $ident); $i++) {
							echo '</tr>';
						}
					}
					if ($ident != $lastIdent) {
						echo "<tr class='aclmanager-ident-". $ident."'>";
					}

					if ($ident == 1){
						echo "<td><strong>" . h($alias) . "</strong></td>";
					}else{
						echo "<td>" . h($alias) . "</td>";
					}

					foreach ($aros as $aro){
						$inherit = $this->Form->value("Perms." . str_replace("/", ":", $action) . ".{$aroAlias}:{$aro[$aroAlias]['id']}-inherit");
						$allowed = $this->Form->value("Perms." . str_replace("/", ":", $action) . ".{$aroAlias}:{$aro[$aroAlias]['id']}"); 
						$value = $inherit ? 'inherit' : null; 
						$icon = $this->Html->image(($allowed ? 'test-pass-icon.png' : 'test-fail-icon.png')); 

						echo "<td>".$icon . " " . $this->Form->select("Perms." . str_replace("/", ":", $action) . ".{$aroAlias}:{$aro[$aroAlias]['id']}", array(array('inherit' => __('Heredar'), 'allow' => __('Permitir'), 'deny' => __('Denegar'))), array('empty' => __('Sin cambio'), 'value' => $value)) . "</td>";
					} 
					$lastIdent = $ident;
				}
				for ($i = 0; $i <= $lastIdent; $i++) {
					echo "</tr>";
				}

				//echo $tab_aux;
				?>
				
				</table>
				<div class="row">
				<br>
				</div>
				<?php
				$options = array('label' => 'Guardar Permisos', 'class' => 'btn btn-success', 'div' => false, 'escape' => false );
				echo $this->Form->end($options);
				?>

				<div class="footer">
				<br>
					<div class="col-sm-6">
					    <?php
						echo $this->Paginator->counter(array(
						'format' => __('Página {:page} de {:pages}, viendo {:current} registros de un total de {:count}')
						));
						?>
					</div>
					<div class="col-sm-6">
						<ul class="pagination pagination-lg" style="float:right">
                            <?php
                                echo $this->Paginator->prev(__('«'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                                echo $this->Paginator->next(__('»'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                            ?>
                        </ul>
					</div>
			    </div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<legend><?php echo __('Permisos para'); ?></legend>
				<?php 
				$aroModels = Configure::read("AclManager.aros");
				if ($aroModels > 1): ?>
					<div class="btn-group-vertical">
					<?php foreach ($aroModels as $aroModel): ?>
						<?php
							if ($aroModel == "Group")
						 		echo $this->Html->link(__('<i class="fa fa-users"></i> Grupos'), array('aro' => 'Group'), array('class' => 'btn btn-default btn-block', 'escape' => false));
						 	else
						 		echo $this->Html->link(__('<i class="fa fa-user"></i> Usuarios'), array('aro' => 'User'), array('class' => 'btn btn-default btn-block', 'escape' => false));
						 	?>
					<?php endforeach; ?>
					
				</div>
				<br><br>
				<?php endif; ?>

				<legend><?php echo __('Acciones'); ?></legend>

				<div class="btn-group-vertical">
					<?php echo $this->Html->link(__('<i class="fa fa-home"></i> Inicio'), array('action' => 'index'), array('class' => 'btn btn-default btn-block', 'escape' => false)); ?>
                    <?php echo $this->Html->link(__('<i class="fa fa-check-square-o"></i> Administrar Permisos'), array('action' => 'permissions'), array('class' => 'btn btn-default btn-block', 'escape' => false)); ?>
					<?php echo $this->Html->link(__('<i class="fa fa-refresh"></i> Actualizar ACOs'), array('action' => 'update_acos'), array('class' => 'btn btn-default btn-block', 'escape' => false)); ?>
					<?php echo $this->Html->link(__('<i class="fa fa-refresh"></i> Actualizar AROs'), array('action' => 'update_aros'), array('class' => 'btn btn-default btn-block', 'escape' => false)); ?>

					<?php echo $this->Html->link(__('<i class="fa fa-close"></i> Eliminar Reglas'), array('action' => 'drop'), array('class' => 'btn btn-default btn-block', 'escape' => false), __("¿Desea eliminar las reglas de vistas?")); ?>

					<?php echo $this->Html->link(__('<i class="fa fa-close"></i> Eliminar Permisos'), array('action' => 'drop_perms'), array('class' => 'btn btn-default btn-block', 'escape' => false), __("¿Desea eliminar los permisos de usuarios?")); ?>
				</div>

			</div>
		</div>
	</div>
</div>