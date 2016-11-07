<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<?php echo $this->Form->create('Establecimiento', array(
				'class' => '', 
				'role' => 'form',
				'autocomplete' => 'off',
				'inputDefaults' => array(
					'format' => array('before', 'label', 'between', array('input', 'checkbox'), 'error', 'after'),
					'div' => array('class' => 'form-group col-sm-6 col-lg-4 col-xs-12'),
					'class' => array('form-control'),
					'label' => array('class' => ''),
					'between' => '<div class="controls">',
					'after' => '</div>',
					'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
				))); 
				echo $this->Form->hidden('id');?>
				<div class="" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
						<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Información</a></li>
						<li role="presentation" class=""><a href="#tab_content2" id="profile-tab" role="tab" data-toggle="tab" aria-expanded="true">Programas Escolares</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
						<?php
							echo '<div class="row">';
							echo $this->Form->input('nombre', array('label' => array('text'=> 'Nombre de Establecimiento'), 'type' =>  'text'));
							echo $this->Form->input('id_departamento', array('label' => array('text'=> 'Departamento'), 'type' => 'select', 'options' => $departamentos));
							echo $this->Form->input('id_municipio', array('label' => array('text'=> 'Municipio'), 'type' => 'select', 'options' => $municipios));
							echo '</div>';
							echo '<div class="row">';
							echo $this->Form->input('observaciones', array('label' => array('text'=> 'Observaciones'), 'type' =>  'textarea', 'rows' => 4));
							$op = array( 0 => 'Inactivo', 1 => 'Activo');
							echo $this->Form->input('estado_activo', array('label' => array('text'=> 'Estado Activo'), 'type' =>  'select', 'options' => $op));
							echo '</div>';
						?>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
							<div class="row">
								<div class="col-sm-3">
									<a class="btn btn-info btnNuevaLinea" tabindex="8">
										<i class="fa fa-plus"></i> Nueva L&iacute;nea
									</a>
									<br>
									<br>
								</div>
							</div>
							<table class="data table table-striped no-margin" id="tblDetProgramas">
								<caption>Lista de Programas Escolares Asignados</caption>
								<thead>
									<tr>
										<th>Programa</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$no =0;
								foreach ($this->request->data['EstablecimientoPrograma'] as $key => $value) { ?>
									<tr>
										<td><div class='form-group'><div class='controls'><input class='form-control programa' type='text' name='data[EstablecimientoPrograma][<?php echo $no ?>][programa]' readonly value='<?php echo $value["Programa"]["nombre"] ?>'></div></div></td>
										<td></td>
										<td style='display:none;'>
											<input class='form-control codigo' name='data[EstablecimientoPrograma][<?php echo $no ?>][id_programa]' value='<?php echo $value["Programa"]["id"] ?>'>
											<input class='form-control' name='data[EstablecimientoPrograma][<?php echo $no ?>][id]' value='<?php echo $value["EstablecimientoPrograma"]["id"] ?>'>
										</td>
									</tr>
								<?php
								$no++;
								}
								?>
								</tbody>
							</table>
						<?php 

						?>
						</div>
					</div>
				</div>
				<?php
				$options = array('label' => 'Editar', 'class' => 'btn btn-success', 'div' => false, 'escape' => false );
				echo '<div class="ln_solid"></div>';
				echo $this->Form->end($options); ?>
			</div> <!-- /.x-content -->
		</div><!-- /.x-panel -->
	</div>	<!-- /.col -->
</div><!-- /.row -->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="mdl" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel">Programas Escolares</h4>
			</div>
			<div class="modal-body">
				<div class="input-group col-md-6" >
					<input autocomplete="off" class="form-control" placeholder="Nombre de Programa" id="txtBusq" type="text">
					<div class="input-group-btn">
						<button class="btn btn-default" data-target="" type="button" onclick="busqPrograma()"><span class="glyphicon glyphicon-search"></span></button>
					</div>
				</div>
				<br>
				<table class="data table table-striped no-margin" id="tblBusq">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nombre</th>
							<th>Descripcion</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
			</div>
		</div>
	</div>
</div>
<?php $this->Js->buffer("
	 $('#EstablecimientoEditarForm').bootstrapValidator({
		excluded: [':disabled'],
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		submitHandler: function (validator, form, submitButton) {
			// Do nothing
		},
		fields: {
			\"data[Establecimiento][nombre]\": {
				validators: {
					notEmpty: {
						message: 'Es necesario que ingrese un nombre de establecimiento'
					}
				}
			},
			\"data[Establecimiento][cod_departamento]\": {
				validators: {
					notEmpty: {
						message: 'Es necesario que seleccione un departamento'
					}
				}
			},
			\"data[Establecimiento][cod_municipio]\": {
				validators: {
					notEmpty: {
						message: 'Es necesario que seleccione un municipio'
					}
				}
			},
			\"data[Establecimiento][estado_activo]\": {
				validators: {
					notEmpty: {
						message: 'Es necesario que indique el estado del establecimiento'
					}
				}
			}
		}
	});

	$('.btnNuevaLinea').on('click', function(){
		$('#mdl').modal('show');
	});

	busqPrograma();
");
	$this->Js->get('#EstablecimientoIdDepartamento')->event('click',
		$this->Js->request(
			array('controller' => 'Personas', 'action' => 'filterMunicipios'),
			array(
				'update' => '#EstablecimientoIdMunicipio',
				'async' => true,
				'dataExpression' => true,
				'method' => 'post',
				'data' => $this->Js->serializeForm(array('isForm' => true, 'inline' => true))
			)
		)
	);
?>

<script type="text/javascript">
	var imgLoading = "<br><br><br><center><img src='<?php echo $this->webroot; ?>img/loading.gif' /></center>";
	var no = <?php echo $no ?>;
	var arrBusqProgramas = null;
	var Consulta ={
		codigo: null,
		nombre: null,
		descripcion: null
	}

	function removeRow(obj){
		var tr = $(obj).parents('tr');
		tr.css('background-color', '#FF3700');
		tr.fadeOut(400, function () {
			tr.remove();
		});
	}

	function busqPrograma(){
		Consulta.nombre = $('#txtBusq').val();
		$("#tblBusq> tbody").html(imgLoading);
		$.ajax({async:true,
			data:{Consulta},
			dataType:'html',
			success:function (data, textStatus) {
				var datos = $.parseJSON(data);
				arrBusqProgramas = datos.Records;
				$("#tblBusq> tbody").html("");
				if (datos.Records.length == 0){
					$("#tblBusq> tbody").html("<center>No se encontraron resultados</center>");
				}
				for(var d in datos.Records){
					var row = "<tr><td>" + datos.Records[d].codigo +"</td>"+
					"<td>" + datos.Records[d].nombre +"</td>"+
					"<td>" + datos.Records[d].descripcion +
					"</td></tr>";
					$("#tblBusq> tbody").append(row);
				}
				$('#tblBusq> tbody').find('tr').click( function(){
					ob = this;
					cu = arrBusqProgramas[$(ob).index()].codigo;
					encontrado = false;

					$('#tblDetProgramas> tbody').find('tr').each(function(i, tr){
						ro = $(tr).find('.codigo').val();
						if(ro == cu)
							encontrado = true;
					}).promise().done(function(k){
						if(encontrado == false){
							var fila = "<tr><td><div class='form-group'><div class='controls'><input class='form-control programa' type='text' name='data[EstablecimientoPrograma]["+no+"][programa]' readonly value='"+arrBusqProgramas[$(ob).index()].nombre+"'></div></div></td>"+
								"<td style='display:none;'><input class='form-control codigo' name='data[EstablecimientoPrograma]["+no+"][id_programa]' value='"+arrBusqProgramas[$(ob).index()].codigo+"'><input class='form-control' name='data[EstablecimientoPrograma]["+no+"][id]' value='0'></td>"+
								"<td><button type='button' class='btn btn-danger deleteLink' onclick='removeRow(this)'><i class='glyphicon glyphicon-trash'></i></td></tr>";
							$("#tblDetProgramas> tbody:last").append(fila);
							$('#mdl').modal('hide');
						}else{
							new PNotify({
                                  title: 'Informacion',
                                  type: 'info',
                                  text: 'Ya ha utilizado este programa seleccionado.',
                                  nonblock: {
                                      nonblock: true
                                  },
                                  styling: 'bootstrap3',
                                  addclass: 'dark'
                              });
						}
					});
				});
			},
			type:'post',
			url:'<?php echo $this->base; ?>/programas/buscaProgramas'
		});
	}
</script>