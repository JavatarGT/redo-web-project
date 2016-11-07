<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<?php echo $this->Html->link(__('<i class="fa fa-backward"></i> Atrás'), array('action' => 'index_cmp', $iddesembolso), array('class' => 'btn btn-primary', 'escape' => false)); ?>
			<div class="ln_solid"></div>
			<div class="x_content">
				<?php echo $this->Form->create('Compra', array(
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
				echo $this->Form->hidden('id');
				echo $this->Form->hidden('saldo', array('default'=> $saldo));
				?>
				<div class="" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
						<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Información de Compra</a></li>
						<li role="presentation" class=""><a href="#tab_content2" id="profile-tab" role="tab" data-toggle="tab" aria-expanded="true">Detalle de la Compra</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
						<?php
							echo $this->Form->hidden('id_desembolso');
							echo '<div class="row">';
							echo $this->Form->input('descripcion', array('label' => array('text'=> 'Observaciones'), 'type' =>  'textarea', 'rows' => 4));
							echo $this->Form->input('monto_total', array('label' => array('text'=> 'Monto Total Q.'), 'type' =>  'text', 'readonly' => 'readonly'));
							echo '</div>';
							echo '<legend>Periodo de Compra</legend>';
							echo '<div class="row">';
							echo $this->Form->input('fecha_inicio', array('label' => array('text'=> 'Fecha de Inicio'), 'type' =>  'text'));
							echo $this->Form->input('fecha_fin', array('label' => array('text'=> 'Fecha de Finalizacion'), 'type' => 'text'));
							echo '</div>';
							
						?>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
							<div class="row">
								<div class="col-sm-3">
									<a class="btn btn-info btnNuevaLinea" tabindex="8">
										<i class="fa fa-plus"></i> Nuevo Gasto
									</a>
									<br>
									<br>
								</div>
							</div>
							<div class="table-responsive">
								<table class="data table table-striped no-margin" id="tblDetGastos" style="table-layout:fixed;">
									<caption>Lista de detalle de gastos de la compra</caption>
									<thead>
										<tr>
											<th style="width:60px;">Tipo de Documento</th>
											<th style="width:200px;">Descripción de Gasto</th>
											<th style="width:60px;">No. de Factura</th>
											<th style="width:60px;">Serie</th>
											<th style="width:80px;">Fecha</th>
											<th style="width:70px;">Sub-Total</th>
											<th style="width:100px;">Acciones</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
									<tfoot>
										<tr>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											<th><b>Monto Total</b></th>
											<th>
												<div class="form-group has-feedback">
													<div class="controls">
														<b type='text' name='tMonto' id='tMonto'>0.00</b>
													</div>
												</div>
											</th>
											<th></th>
										</tr>
									</tfoot>
								</table>
							</div>
						<?php 

						?>
						</div>
					</div>
				</div>
				<?php
				$options = array('label' => 'Guardar', 'class' => 'btn btn-success', 'div' => false, 'escape' => false );
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
	 $('#CompraAgregarForm').bootstrapValidator({
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
			\"data[Compra][descripcion]\": {
				validators: {
					notEmpty: {
						message: 'Es necesario que ingrese una observacion de la compra'
					}
				}
			},
			\"data[Compra][monto_total]\": {
				validators: {
					notEmpty: {
						message: 'Es necesario que ingrese un monto de la compra'
					}
				}
			},
			\"data[Compra][fecha_inicio]\": {
				validators: {
					notEmpty: {
						message: 'Debe ingresar una fecha'
					},
					date:{
						format: 'DD/MM/YYYY',
						message: 'Por favor, ingresar una fecha válida'
					}
				}
			},
			\"data[Compra][fecha_fin]\": {
				validators: {
					notEmpty: {
						message: 'Debe ingresar una fecha'
					},
					date:{
						format: 'DD/MM/YYYY',
						message: 'Por favor, ingresar una fecha válida'
					}
				}
			},
			\"tMonto\": {
				validators:{
					notEmpty:{
						message: 'Debe indicar un monto'
					},
					between: {
						min: '1',
						max: 'data[Compra][saldo]',
						message: 'El monto gastado excede al monto de desembolso'
					}
				}
			}
		}
	});	

	$('#CompraFechaInicio').daterangepicker(optionSet1, function(start, end, label) {});
	$('#CompraFechaFin').daterangepicker(optionSet1, function(start, end, label) {});

	$('#CompraFechaInicio').inputmask('99/99/9999');
	$('#CompraFechaFin').inputmask('99/99/9999');

	$('.btnNuevaLinea').on('click', function(){
		fila();
		//$('#mdl').modal('show');
	});

	onlyNumbers();
");
?>

<script type="text/javascript">
	var no = 0;
	var optionSet1 = {
		singleDatePicker: true,
		calender_style: 'picker_3',
		format: 'DD/MM/YYYY',
		locale: {
			daysOfWeek: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
			monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			firstDay: 1
		}
	};

	function removeRow(obj){
		var tr = $(obj).parents('tr');
		tr.css('background-color', '#FF3700');
		tr.fadeOut(400, function () {
			tr.remove();
		});
	}

	function onlyNumbers(){
		$('.monto').keypress(function (event) {
			var text = $(this).val();
			if (
				(text.indexOf('.') != -1) &&
				(text.substring(text.indexOf('.')).length > 2) &&
				(event.which != 0 && event.which != 8) &&
				($(this)[0].selectionStart >= text.length - 2))
					return false;
			else
				return isNumber(event, this)
		});
	}

	function isNumber(evt, element) {        
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (
			(charCode != 46 || $(element).val().indexOf('.') != -1) &&
			(charCode < 48 || charCode > 57))
			return false;        
		return true;
	}

	function fila(){
		no +=1;
		var row = "<tr>"+
		"<td>"+
			"<div class='form-group has-feedback'>"+
				"<div class='controls'>"+
					"<select name='data[DetCompra]["+no+"][tipo_doc_gasto]' class='form-control tipodoc' id='DetCompra"+no+"TipoDocGasto'>"+
						"<option value='1'>Factura</option>"+
						"<option value='2'>Recibo</option>"+
						"<option value='3'>Otros</option>"+
					"</select>"+
				"</div>"+
			"</div>"+
		"</td>"+
		"<td>"+
			"<div class='form-group has-feedback'>"+
				"<div class='controls'>"+
					"<textarea class='form-control desc' type='text' name='data[DetCompra]["+no+"][desc_gasto]' id='DetCompra"+no+"DescGasto' rows='2' cols='3'></textarea>"+
				"</div>"+
			"</div>"+
		"</td>"+
		"<td>"+
			"<div class='form-group has-feedback'>"+
				"<div class='controls'>"+
					"<input class='form-control no' type='number' name='data[DetCompra]["+no+"][no_factura]' id='DetCompra"+no+"NoFactura'>"+
				"</div>"+
			"</div>"+
		"</td>"+
		"<td>"+
			"<div class='form-group has-feedback'>"+
				"<div class='controls'>"+
					"<input class='form-control serie' type='text' name='data[DetCompra]["+no+"][serie_factura]' id='DetCompra"+no+"SerieFactura'>"+
				"</div>"+
			"</div>"+
		"</td>"+
		"<td>"+
			"<div class='form-group has-feedback'>"+
				"<div class='controls'>"+
					"<input class='form-control fecha' type='text' name='data[DetCompra]["+no+"][fecha_factura]' id='DetCompra"+no+"FechaFactura'>"+
				"</div>"+
			"</div>"+
		"</td>"+
		"<td>"+
			"<div class='form-group has-feedback'>"+
				"<div class='controls'>"+
					"<input class='form-control monto' type='text' name='data[DetCompra]["+no+"][monto_detalle]' id='DetCompra"+no+"MontoDetalle'>"+
				"</div>"+
			"</div>"+
		"</td>"+
		"<td>"+
			"<button type='button' class='btn btn-danger deleteLink' onclick='removeRow(this)'>"+
				"<i class='glyphicon glyphicon-trash'></i></button></td>"+
		"</tr>";
		
		$("#tblDetGastos> tbody:last").append(row);

		var f1 = 'data[DetCompra]['+no+'][desc_gasto]';
		var f2 = 'data[DetCompra]['+no+'][no_factura]';
		var f3 = 'data[DetCompra]['+no+'][fecha_factura]';
		var f4 = 'data[DetCompra]['+no+'][monto_detalle]';

		$('#CompraAgregarForm').bootstrapValidator('addField', f1, {
			validators:{
				notEmpty:{
					message: 'Debe ingresar una descripción de gasto'
				}
			}
		});

		$('#CompraAgregarForm').bootstrapValidator('addField', f2, {
			validators:{
				notEmpty:{
					message: 'Debe ingresar un número de factura'
				}
			}
		});

		$('#CompraAgregarForm').bootstrapValidator('addField', f3, {
			validators:{
				notEmpty:{
					message: 'Debe ingresar una fecha de la factura'
				},
				date:{
					format: 'DD/MM/YYYY',
					message: 'Por favor, ingresar una fecha válida'
				}
			}
		});

		$('#CompraAgregarForm').bootstrapValidator('addField', f4, {
			validators:{
				notEmpty:{
					message: 'Debe ingresar un monto de gasto'
				}
			}
		});

		var f = 'DetCompra'+no+'FechaFactura';
		//$('#'+f).daterangepicker(optionSet1, function(start, end, label) {});
		$('#DetCompra'+no+'FechaFactura').daterangepicker(optionSet1, function(start, end, label) {});
		$('#DetCompra'+no+'FechaFactura').inputmask('99/99/9999');
		onlyNumbers();
		changeMonto();
	}

	function changeMonto(){
		$( ".monto" ).change(function() {
			checkMonto();
		});
	}

	function checkMonto(){
		monto = 0;
		$('#tblDetGastos> tbody').find('tr').each(function(i,tr) {
			if ($(tr).find('.monto').val() > 0)
				monto += parseFloat($(tr).find('.monto').val());
			else monto = 0;
		}).promise().done( function(k){
			$("#CompraMontoTotal").val(monto.toFixed(2));
			$("#tMonto").val(monto.toFixed(2));
			$("#tMonto").html("Q." + monto.toFixed(2));

			$('#CompraAgregarForm').data('bootstrapValidator').revalidateField('tMonto');
		});
	}

</script>