<li class="<?php echo $this->params->controller == 'pages' ? 'active' : '';  ?>">
    <?php echo $this->Html->link('<i class="fa fa-dashboard"></i>Inicio',array('plugin' => null, 'controller' => 'pages','action' => 'index'), array('escape' => false)); ?>
</li>
<?php if ( $this->params->controller == 'personas' ) { ?>
    <?php if ( $this->params->action == 'index' ) {?>
        <li class="active"><i class="fa fa-list"></i> Personas</li>
    <?php }?>
    <?php if ( $this->params->action == 'view' ) {?>
        <li><a href="<?php echo $this->base; ?>/personas/"><i class="fa fa-list"></i> Personas</a></li>
        <li class="active"><i class="fa fa-eye"></i> Ver</li>
    <?php }?>
    <?php if ( $this->params->action == 'add' ) {?>
        <li><a href="<?php echo $this->base; ?>/personas/"><i class="fa fa-list"></i> Personas</a></li>
        <li class="active"><i class="fa fa-plus"></i> Nuevo</li>
    <?php }?>
    <?php if ( $this->params->action == 'edit' ) {?>
        <li><a href="<?php echo $this->base; ?>/personas/"><i class="fa fa-list"></i> Personas</a></li>
        <li class="active"><i class="fa fa-edit"></i> Editar</li>
    <?php }?>
<?php }?>
<?php if ( $this->params->controller == 'perfiles' ) { ?>
    <?php if ( $this->params->action == 'index' ) {?>
        <li class="active"><i class="fa fa-list"></i> Perfiles</li>
    <?php }?>
    <?php if ( $this->params->action == 'view' ) {?>
        <li><a href="<?php echo $this->base; ?>/perfiles/"><i class="fa fa-list"></i> Perfiles</a></li>
        <li class="active"><i class="fa fa-eye"></i> Ver</li>
    <?php }?>
    <?php if ( $this->params->action == 'add' ) {?>
        <li><a href="<?php echo $this->base; ?>/perfiles/"><i class="fa fa-list"></i> Perfiles</a></li>
        <li class="active"><i class="fa fa-plus"></i> Nuevo</li>
    <?php }?>
    <?php if ( $this->params->action == 'edit' ) {?>
        <li><a href="<?php echo $this->base; ?>/perfiles/"><i class="fa fa-list"></i> Perfiles</a></li>
        <li class="active"><i class="fa fa-edit"></i> Editar</li>
    <?php }?>
<?php }?>
<?php if ( $this->params->controller == 'ocupaciones' ) { ?>
    <?php if ( $this->params->action == 'index' ) {?>
        <li class="active"><i class="fa fa-list"></i> Ocupaciones</li>
    <?php }?>
    <?php if ( $this->params->action == 'view' ) {?>
        <li><a href="<?php echo $this->base; ?>/ocupaciones/"><i class="fa fa-list"></i> Ocupaciones</a></li>
        <li class="active"><i class="fa fa-eye"></i> Ver</li>
    <?php }?>
    <?php if ( $this->params->action == 'add' ) {?>
        <li><a href="<?php echo $this->base; ?>/ocupaciones/"><i class="fa fa-list"></i> Ocupaciones</a></li>
        <li class="active"><i class="fa fa-plus"></i> Nuevo</li>
    <?php }?>
    <?php if ( $this->params->action == 'edit' ) {?>
        <li><a href="<?php echo $this->base; ?>/ocupaciones/"><i class="fa fa-list"></i> Ocupaciones</a></li>
        <li class="active"><i class="fa fa-edit"></i> Editar</li>
    <?php }?>
<?php }?>
<?php if ( $this->params->controller == 'religiones' ) { ?>
    <?php if ( $this->params->action == 'index' ) {?>
        <li class="active"><i class="fa fa-list"></i> Religiones</li>
    <?php }?>
    <?php if ( $this->params->action == 'view' ) {?>
        <li><a href="<?php echo $this->base; ?>/religiones/"><i class="fa fa-list"></i> Religiones</a></li>
        <li class="active"><i class="fa fa-eye"></i> Ver</li>
    <?php }?>
    <?php if ( $this->params->action == 'add' ) {?>
        <li><a href="<?php echo $this->base; ?>/religiones/"><i class="fa fa-list"></i> Religiones</a></li>
        <li class="active"><i class="fa fa-plus"></i> Nuevo</li>
    <?php }?>
    <?php if ( $this->params->action == 'edit' ) {?>
        <li><a href="<?php echo $this->base; ?>/religiones/"><i class="fa fa-list"></i> Religiones</a></li>
        <li class="active"><i class="fa fa-edit"></i> Editar</li>
    <?php }?>
<?php }?>
<?php if ( $this->params->controller == 'escolaridades' ) { ?>
    <?php if ( $this->params->action == 'index' ) {?>
        <li class="active"><i class="fa fa-list"></i> Escolaridades</li>
    <?php }?>
    <?php if ( $this->params->action == 'view' ) {?>
        <li><a href="<?php echo $this->base; ?>/escolaridades/"><i class="fa fa-list"></i> Escolaridades</a></li>
        <li class="active"><i class="fa fa-eye"></i> Ver</li>
    <?php }?>
    <?php if ( $this->params->action == 'add' ) {?>
        <li><a href="<?php echo $this->base; ?>/escolaridades/"><i class="fa fa-list"></i> Escolaridades</a></li>
        <li class="active"><i class="fa fa-plus"></i> Nuevo</li>
    <?php }?>
    <?php if ( $this->params->action == 'edit' ) {?>
        <li><a href="<?php echo $this->base; ?>/escolaridades/"><i class="fa fa-list"></i> Escolaridades</a></li>
        <li class="active"><i class="fa fa-edit"></i> Editar</li>
    <?php }?>
<?php }?>
<?php if ( $this->params->controller == 'GrupoEtnicos' ) { ?>
    <?php if ( $this->params->action == 'index' ) {?>
        <li class="active"><i class="fa fa-list"></i> Grupos Etnicos</li>
    <?php }?>
    <?php if ( $this->params->action == 'view' ) {?>
        <li><a href="<?php echo $this->base; ?>/GrupoEtnicos/"><i class="fa fa-list"></i> Grupos Etnicos</a></li>
        <li class="active"><i class="fa fa-eye"></i> Ver</li>
    <?php }?>
    <?php if ( $this->params->action == 'add' ) {?>
        <li><a href="<?php echo $this->base; ?>/GrupoEtnicos/"><i class="fa fa-list"></i> Grupos Etnicos</a></li>
        <li class="active"><i class="fa fa-plus"></i> Nuevo</li>
    <?php }?>
    <?php if ( $this->params->action == 'edit' ) {?>
        <li><a href="<?php echo $this->base; ?>/GrupoEtnicos/"><i class="fa fa-list"></i> Grupos Etnicos</a></li>
        <li class="active"><i class="fa fa-edit"></i> Editar</li>
    <?php }?>
<?php }?>
<?php if ( $this->params->controller == 'ImpresionClinicas' ) { ?>
    <?php if ( $this->params->action == 'index' ) {?>
        <li class="active"><i class="fa fa-list"></i> Impresión Clínica</li>
    <?php }?>
    <?php if ( $this->params->action == 'view' ) {?>
        <li><a href="<?php echo $this->base; ?>/ImpresionClinicas/"><i class="fa fa-list"></i> Impresión Clínica</a></li>
        <li class="active"><i class="fa fa-eye"></i> Ver</li>
    <?php }?>
    <?php if ( $this->params->action == 'add' ) {?>
        <li><a href="<?php echo $this->base; ?>/ImpresionClinicas/"><i class="fa fa-list"></i> Impresión Clínica</a></li>
        <li class="active"><i class="fa fa-plus"></i> Nuevo</li>
    <?php }?>
    <?php if ( $this->params->action == 'edit' ) {?>
        <li><a href="<?php echo $this->base; ?>/ImpresionClinicas/"><i class="fa fa-list"></i> Impresión Clínica</a></li>
        <li class="active"><i class="fa fa-edit"></i> Editar</li>
    <?php }?>
<?php }?>

<!-- Módulo de Clínica -->
<?php if ( $this->params->controller == 'clinicas' ) { ?>
    <?php if ( $this->params->action == 'index' ) {?>
        <li class="active"><i class="fa fa-list"></i> Pacientes</li>
    <?php }?>
    <?php if ( $this->params->action == 'view' ) {?>
        <li><a href="<?php echo $this->base; ?>/clinicas/"><i class="fa fa-list"></i> Pacientes</a></li>
        <li class="active"><i class="fa fa-eye"></i> Ver</li>
    <?php }?>
    <?php if ( $this->params->action == 'add' ) {?>
        <li><a href="<?php echo $this->base; ?>/clinicas/"><i class="fa fa-list"></i> Pacientes</a></li>
        <li class="active"><i class="fa fa-plus"></i> Nuevo</li>
    <?php }?>
    <?php if ( $this->params->action == 'edit' ) {?>
        <li><a href="<?php echo $this->base; ?>/clinicas/"><i class="fa fa-list"></i> Pacientes</a></li>
        <li class="active"><i class="fa fa-edit"></i> Editar</li>
    <?php }?>
<?php }?>

<?php if ( $this->params->controller == 'Ptcontrols' ) { ?>
    <?php if ( $this->params->action == 'index' ) {?>
        <li><a href="<?php echo $this->base; ?>/clinicas/"><i class="fa fa-list"></i> Pacientes</a></li>
        <li class="active"><i class="fa fa-list-alt"></i> Pesos y Tallas</li>
    <?php }?>
    <?php if ( $this->params->action == 'view' ) {?>
        <li><a href="<?php echo $this->base; ?>/clinicas/"><i class="fa fa-list"></i> Pacientes</a></li>
        <li><a href="<?php echo $this->base; ?>/Ptcontrols/index/<?php echo $idpersona; ?>" ><i class="fa fa-list"></i> Pesos y Tallas</a></li>
        <li class="active"><i class="fa fa-eye"></i> Ver</li>
    <?php }?>
    <?php if ( $this->params->action == 'add' ) {?>
        <li><a href="<?php echo $this->base; ?>/clinicas/"><i class="fa fa-list"></i> Pacientes</a></li>
        <li><a href="<?php echo $this->base; ?>/Ptcontrols/index/<?php echo $idpersona; ?>" ><i class="fa fa-list"></i> Pesos y Tallas</a></li>
        <li class="active"><i class="fa fa-plus"></i> Nuevo</li>
    <?php }?>
    <?php if ( $this->params->action == 'edit' ) {?>
        <li><a href="<?php echo $this->base; ?>/clinicas/"><i class="fa fa-list"></i> Pacientes</a></li>
        <li><a href="<?php echo $this->base; ?>/Ptcontrols/index/<?php echo $idpersona; ?>" ><i class="fa fa-list"></i> Pesos y Tallas</a></li>
        <li class="active"><i class="fa fa-edit"></i> Editar</li>
    <?php }?>
<?php }?>

<!-- Módulo de Historias Clínicas -->
<?php if ( $this->params->controller == 'HistoriaClinicas' ) { ?>
    <?php if ( $this->params->action == 'index' ) {?>
        <li><a href="<?php echo $this->base; ?>/clinicas/"><i class="fa fa-list"></i> Pacientes</a></li>
        <li class="active"><i class="fa fa-list-alt"></i> Historias Clínicas</li>
    <?php }?>
    <?php if ( $this->params->action == 'view' ) {?>
        <li><a href="<?php echo $this->base; ?>/clinicas/"><i class="fa fa-list"></i> Pacientes</a></li>
        <li><a href="<?php echo $this->base; ?>/HistoriaClinicas/index/<?php echo $idpersona; ?>" ><i class="fa fa-list"></i> Historias Clínicas</a></li>
        <li class="active"><i class="fa fa-eye"></i> Ver</li>
    <?php }?>
    <?php if ( $this->params->action == 'add' ) {?>
        <li><a href="<?php echo $this->base; ?>/clinicas/"><i class="fa fa-list"></i> Pacientes</a></li>
        <li><a href="<?php echo $this->base; ?>/HistoriaClinicas/index/<?php echo $idpersona; ?>" ><i class="fa fa-list"></i> Historias Clínicas</a></li>
        <li class="active"><i class="fa fa-plus"></i> Nuevo</li>
    <?php }?>
    <?php if ( $this->params->action == 'edit' ) {?>
        <li><a href="<?php echo $this->base; ?>/clinicas/"><i class="fa fa-list"></i> Pacientes</a></li>
        <li><a href="<?php echo $this->base; ?>/HistoriaClinicas/index/<?php echo $idpersona; ?>" ><i class="fa fa-list"></i> Historias Clínicas</a></li>
        <li class="active"><i class="fa fa-edit"></i> Editar</li>
    <?php }?>
<?php }?>
<!-- Módulo de Reconsultas -->
<?php if ( $this->params->controller == 'reconsultas' ) { ?>
    <?php if ( $this->params->action == 'index' ) {?>
        <li><a href="<?php echo $this->base; ?>/clinicas/"><i class="fa fa-list"></i> Pacientes</a></li>
        <li><a href="<?php echo $this->base; ?>/HistoriaClinicas/index/<?php echo $idpersona; ?>" ><i class="fa fa-list"></i> Historias Clínicas</a></li>
        <li class="active"><i class="fa fa-list-alt"></i> Reconsultas</li>
    <?php }?>
    <?php if ( $this->params->action == 'view' ) {?>
        <li><a href="<?php echo $this->base; ?>/clinicas/"><i class="fa fa-list"></i> Pacientes</a></li>
        <li><a href="<?php echo $this->base; ?>/HistoriaClinicas/index/<?php echo $idpersona; ?>" ><i class="fa fa-list"></i> Historias Clínicas</a></li>
        <li><a href="<?php echo $this->base; ?>/reconsultas/index/<?php echo $codhistoriaclinica; ?>" ><i class="fa fa-list"></i> Reconsultas</a></li>
        <li class="active"><i class="fa fa-eye"></i> Ver</li>
    <?php }?>
    <?php if ( $this->params->action == 'add' ) {?>
        <li><a href="<?php echo $this->base; ?>/clinicas/"><i class="fa fa-list"></i> Pacientes</a></li>
        <li><a href="<?php echo $this->base; ?>/HistoriaClinicas/index/<?php echo $idpersona; ?>" ><i class="fa fa-list"></i> Historias Clínicas</a></li>
        <li><a href="<?php echo $this->base; ?>/reconsultas/index/<?php echo $codhistoriaclinica; ?>" ><i class="fa fa-list"></i> Reconsultas</a></li>
        <li class="active"><i class="fa fa-plus"></i> Nuevo</li>
    <?php }?>
    <?php if ( $this->params->action == 'edit' ) {?>
        <li><a href="<?php echo $this->base; ?>/clinicas/"><i class="fa fa-list"></i> Pacientes</a></li>
        <li><a href="<?php echo $this->base; ?>/HistoriaClinicas/index/<?php echo $idpersona; ?>" ><i class="fa fa-list"></i> Historias Clínicas</a></li>
        <li class="active"><i class="fa fa-edit"></i> Editar</li>
    <?php }?>
<?php }?>
<!-- Módulo de Laboratorios -->
<?php if ( $this->params->controller == 'labs' ) { ?>
    <?php if ( $this->params->action == 'index' ) {?>
        <li class="active"><a href="<?php echo $this->base; ?>/labs/"><i class="fa fa-list"></i> Pacientes</a></li>
    <?php }?>
    <?php if ( $this->params->action == 'view' ) {?>
        <li><a href="<?php echo $this->base; ?>/labs/"><i class="fa fa-list"></i> Pacientes</a></li>
        <li class="active"><i class="fa fa-eye"></i> Ver</li>
    <?php }?>
    <?php if ( $this->params->action == 'add' ) {?>
        <li><a href="<?php echo $this->base; ?>/labs/"><i class="fa fa-list"></i> Pacientes</a></li>
        <li class="active"><i class="fa fa-plus"></i> Nuevo</li>
    <?php }?>
    <?php if ( $this->params->action == 'edit' ) {?>
         <li><a href="<?php echo $this->base; ?>/labs/"><i class="fa fa-list"></i> Pacientes</a></li>
        <li class="active"><i class="fa fa-edit"></i> Editar</li>
    <?php }?>
<?php }?>


<?php if ( $this->params->controller == 'laboratorios' ) { ?>
    <?php if ( $this->params->action == 'index' ) {?>
        <li><a href="<?php echo $this->base; ?>/labs/"><i class="fa fa-list"></i> Pacientes</a></li>
        <li class="active"><i class="fa fa-list-alt"></i> Laboratorios</li>
    <?php }?>
    <?php if ( $this->params->action == 'view' ) {?>
        <li><a href="<?php echo $this->base; ?>/clinicas/"><i class="fa fa-list"></i> Pacientes</a></li>
        <li><a href="<?php echo $this->base; ?>/HistoriaClinicas/index/<?php echo $idpersona; ?>" ><i class="fa fa-list"></i> Historias Clínicas</a></li>
        <li class="active"><i class="fa fa-eye"></i> Ver</li>
    <?php }?>
    <?php if ( $this->params->action == 'add' ) {?>
        <li><a href="<?php echo $this->base; ?>/labs/"><i class="fa fa-list"></i> Pacientes</a></li>
        <li><a href="<?php echo $this->base; ?>/laboratorios/index/<?php echo $idpersona; ?>" ><i class="fa fa-list"></i> Laboratorios</a></li>
        <li class="active"><i class="fa fa-plus"></i> Nuevo</li>
    <?php }?>
    <?php if ( $this->params->action == 'edit' ) {?>
         <li><a href="<?php echo $this->base; ?>/labs/"><i class="fa fa-list"></i> Pacientes</a></li>
        <li><a href="<?php echo $this->base; ?>/laboratorios/index/<?php echo $idpersona; ?>" ><i class="fa fa-list"></i> Laboratorios</a></li>
        <li class="active"><i class="fa fa-edit"></i> Editar</li>
    <?php }?>
<?php }?>
<?php if ( $this->params->controller == 'groups' ) { ?>
    <?php if ( $this->params->action == 'index' ) {?>
        <li class="active"><i class="fa fa-list"></i> Grupos</li>
    <?php }?>
    <?php if ( $this->params->action == 'view' ) {?>
        <li><a href="<?php echo $this->base; ?>/groups/"><i class="fa fa-list"></i> Grupos</a></li>
        <li class="active"><i class="fa fa-eye"></i> Ver</li>
    <?php }?>
    <?php if ( $this->params->action == 'add' ) {?>
        <li><a href="<?php echo $this->base; ?>/groups/"><i class="fa fa-list"></i> Grupos</a></li>
        <li class="active"><i class="fa fa-plus"></i> Nuevo</li>
    <?php }?>
    <?php if ( $this->params->action == 'edit' ) {?>
        <li><a href="<?php echo $this->base; ?>/groups/"><i class="fa fa-list"></i> Grupos</a></li>
        <li class="active"><i class="fa fa-edit"></i> Editar</li>
    <?php }?>
<?php }?>
<?php if ( $this->params->controller == 'users' ) { ?>
    <?php if ( $this->params->action == 'index' ) {?>
        <li class="active"><i class="fa fa-list"></i> Usuarios</li>
    <?php }?>
    <?php if ( $this->params->action == 'view' ) {?>
        <li><a href="<?php echo $this->base; ?>/users/"><i class="fa fa-list"></i> Usuarios</a></li>
        <li class="active"><i class="fa fa-eye"></i> Ver</li>
    <?php }?>
     <?php if ( $this->params->action == 'add' ) {?>
        <li><a href="<?php echo $this->base; ?>/users/"><i class="fa fa-list"></i> Usuarios</a></li>
        <li class="active"><i class="fa fa-user-plus"></i> Nuevo</li>
    <?php }?>
    <?php if ( $this->params->action == 'edit' ) {?>
        <li><a href="<?php echo $this->base; ?>/users/"><i class="fa fa-list"></i> Usuarios</a></li>
        <li class="active"><i class="fa fa-edit"></i> Editar</li>
    <?php }?>
<?php }?>