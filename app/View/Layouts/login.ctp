<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php echo Configure::read('Application.name') ?> - <?php echo !empty($title_for_layout) ? $title_for_layout : ''; ?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <?php echo $this->Html->css('bootstrap/bootstrap.min') ?>
  <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
  <?php echo $this->Html->css('font-awesome/css/font-awesome.min') ?>
  <?php echo $this->Html->css('nprogress/nprogress') ?>
  <?php echo $this->Html->css('animate.css/animate.min.css') ?>
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
<body  class="hold-transition login">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>

  <?php echo $this->Html->script(
  array(
    'jquery/jquery.min',
    'bootstrap/bootstrap.min',
  ));
  echo $this->Js->writeBuffer(); ?>
</body>
</html>