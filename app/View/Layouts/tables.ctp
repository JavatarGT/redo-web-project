<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php echo Configure::read('Application.name') ?> - <?php echo !empty($title_for_layout) ? $title_for_layout : ''; ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<!-- Bootstrap -->
	<?php echo $this->Html->css('bootstrap/bootstrap.min') ?>
	<link id="bootstrap-rtl-link" href="" rel="stylesheet" />
	<!-- Font Awesome -->
	<?php echo $this->Html->css('font-awesome/css/font-awesome.min') ?>
	<!-- NProgress -->
	<?php echo $this->Html->css('nprogress/nprogress') ?>
	<!-- Datatables -->
	<?php echo $this->Html->css('datatables.net-bs/dataTables.bootstrap.min') ?>
	<?php echo $this->Html->css('datatables.net-buttons-bs/buttons.bootstrap.min') ?>
	<?php echo $this->Html->css('datatables.net-fixedheader-bs/fixedHeader.bootstrap.min') ?>
	<?php echo $this->Html->css('datatables.net-responsive-bs/responsive.bootstrap.min') ?>
	<?php echo $this->Html->css('datatables.net-scroller-bs/scroller.bootstrap.min') ?>
	<?php echo $this->Html->css('pnotify/pnotify') ?>
	<?php echo $this->Html->css('pnotify/pnotify.nonblock') ?>

	<?php echo $this->Html->css('malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min') ?>

	<!-- Custom Theme Style -->
	<?php echo $this->Html->css('build/custom.min') ?>

	<?php
		if (is_file(WWW_ROOT . 'css' . DS . $this->params->controller . '.css')) {
			echo $this->Html->css($this->params->controller);
		}
		if (is_file(WWW_ROOT . 'css' . DS . $this->params->controller . DS . $this->params->action . '.css')) {
			echo $this->Html->css($this->params->controller . '/' . $this->params->action);
		}
	?>


</head>
<body class="nav-md footer_fixed">
	<div class="container body">
	  <div class="main_container">
		<div class="col-md-3 left_col">
		  <div class="left_col scroll-view">
			<div class="navbar nav_title" style="border: 0;">
			  <a href="<?php echo $this->webroot; ?>pages/home" class="site_title"><i class="fa fa-paw"></i> <span>REDO-Tactic AV</span></a>
			</div>

			<div class="clearfix"></div>

			<!-- menu profile quick info -->
			<div class="profile">
			  <div class="profile_pic">
				<img src="<?php echo $this->webroot;?>/img/user.png" alt="..." class="img-circle profile_img">
			  </div>
			  <div class="profile_info">
				<span>Bienvenido,</span>
				<h2>Juan Chiquin</h2>
			  </div>
			</div>
			<!-- /menu profile quick info -->

			<br />

			<!-- sidebar menu -->
			<?php echo $this->element('nav') ?>
			<!-- /sidebar menu -->
			
		  </div>
		</div>

		<!-- top navigation -->
		<div class="top_nav">
		  <div class="nav_menu">
			<nav>
			  <div class="nav toggle">
				<a id="menu_toggle"><i class="fa fa-bars"></i></a>
			  </div>

			  <ul class="nav navbar-nav navbar-right">
				<li class="">
				  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					<img src="<?php echo $this->webroot;?>/img/user.png" alt="">Juan Chiquin
					<span class=" fa fa-angle-down"></span>
				  </a>
				  <ul class="dropdown-menu dropdown-usermenu pull-right">
					<li><a href="<?php echo $this->webroot.'personas/perfil/'.AuthComponent::user('id_persona'); ?>"> Perfil</a></li>
					<li>
					  <a href="javascript:;">
						<span class="badge bg-red pull-right">50%</span>
						<span>Settings</span>
					  </a>
					</li>
					<li><a href="javascript:;">Help</a></li>
					<li><a href="<?php echo $this->webroot; ?>users/logout"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a></li>
				  </ul>
				</li>

			  </ul>
			</nav>
		  </div>

		</div>
		<!-- /top navigation -->

		<!-- page content -->
		<div class="right_col" role="main">
			<div class="">
				<div class="clearfix"></div>
				<?php echo $this->Session->flash();?>
				<div class="page-title">
					<div class="title_left">
						<h3><?php echo !empty($title_for_layout) ? $title_for_layout : ''; ?></h3>
					</div>
				</div>
				<div class="clearfix"></div>
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
		<!-- /page content -->

		<!-- footer content -->
		<?php echo $this->element('footer') ?>
		<!-- /footer content -->
	  </div>
	</div>
	<?php echo $this->Html->script(
		array(
			'jquery/jquery.min',
			'bootstrap/bootstrap.min',
			'fastclick/fastclick',
			'nprogress/nprogress',
			'validation/bootstrapValidator',
			'malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min',
			'datatables.net/js/jquery.dataTables.min',
			'datatables.net-bs/dataTables.bootstrap.min',
			'datatables.net-buttons/js/dataTables.buttons.min',
			'datatables.net-buttons-bs/buttons.bootstrap.min',
			'datatables.net-buttons/js/buttons.flash.min',
			'datatables.net-buttons/js/buttons.html5.min',
			'datatables.net-buttons/js/buttons.print.min',
			'datatables.net-fixedheader/js/dataTables.fixedHeader.min',
			'datatables.net-keytable/js/dataTables.keyTable.min',
			'datatables.net-responsive/js/dataTables.responsive.min',
			'datatables.net-responsive-bs/responsive.bootstrap',
			'datatables.net-scroller/js/datatables.scroller.min',
			'pnotify/pnotify',
			'pnotify/pnotify.nonblock',
			'build/custom.min'
		));
		echo $this->Js->writeBuffer(); 
	?>
</body>
</html>