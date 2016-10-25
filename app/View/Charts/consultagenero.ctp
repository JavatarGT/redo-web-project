<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div>
                        <fieldset>
                            <div class="row">
                            <?php
                                $base_url = array('controller' => 'personas', 'action' => 'index');
                                echo $this->Form->create("Consulta",array('url' => $base_url, 'id' => 'form_consulta'));
                                ?>
                                <div class="form-group col-sm-6 col-lg-3 col-xs-12 has-feedback">
                                    <label for="PersonaCui">Fecha Inicial</label>
                                    <div class="controls">
                                        <input class="form-control" type="text" id="FechaInicial" name="fechainicial">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-lg-3 col-xs-12 has-feedback">
                                    <label for="PersonaNoIgss">Fecha Final</label>
                                    <div class="controls">
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="FechaFinal" name="fechafinal">
                                            <div class='input-group-btn'><button class='btn btn-primary' type='button'><span class='glyphicon glyphicon-search' onclick='grafica()'></span></button></div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    echo $this->Form->end();
                                ?>                                               
                            </div>
                            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->Js->buffer("
    $('#form_consulta').bootstrapValidator({
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
            \"fechainicial\": {
                validators: {
                    notEmpty: {
                        message: 'Es necesario que ingrese una fecha inicial'
                    },
                    date:{
                        max: \"fechafinal\",
                        format: 'DD/MM/YYYY',
                        message: 'Por favor, ingresar una fecha válida'
                   }
                }
            },
            \"fechafinal\": {
                validators: {
                    notEmpty: {
                        message: 'Es necesario que ingrese una fecha final'
                    },
                    date:{
                        min: \"fechainicial\",
                        format: 'DD/MM/YYYY',
                        message: 'Por favor, ingresar una fecha válida'
                   }
                }
            }
        }
    });

    var feci = $('#FechaInicial').datepicker({
        format: 'dd/mm/yyyy'
    }).data('datepicker');

    var fecf = $('#FechaFinal').datepicker({
        format: 'dd/mm/yyyy'
    }).data('datepicker');

    $('#FechaInicial').focus();
    $('#FechaInicial').inputmask('99/99/9999');
    $('#FechaFinal').inputmask('99/99/9999');

    $('#FechaFinal').on('focus', function(e) {
        //feci.hide();
        $('#form_consulta').data('bootstrapValidator').revalidateField('fechainicial');
    });

    $('#FechaInicial').on('focus', function(e) {
        //fecf.hide();
        $('#form_consulta').data('bootstrapValidator').revalidateField('fechafinal');
    });

    $('#FechaFinal').on('change', function(e) {
        //feci.hide();
        $('#form_consulta').data('bootstrapValidator').revalidateField('fechafinal');
    });

    
");
?>
<script type="text/javascript">
    var series = [];
    var series2 = [];
    console.log('asdfasdf');
    var arrDatos = null;
    var Consulta ={
        tipo: null,
        total: null,
        fecha1: null,
        fecha2: null
    };
    function grafica(){
        series = [];
        series2 = [];
        var d1 = ($('#FechaInicial').val()).split('/');
        var d2 = ($('#FechaFinal').val()).split('/');
        Consulta.fecha1=d1[2]+'-'+d1[1]+'-'+d1[0];
        Consulta.fecha2=d2[2]+'-'+d2[1]+'-'+d2[0];
        $.ajax({async:true,
            data:{Consulta},
            dataType:'html', 
            success:function (data, textStatus) {
                var datos = $.parseJSON(data);
                for(var d in datos.Records){
                    series.push([datos.Records[d].tipo,parseInt(datos.Records[d].total,10)]);
                }
                $.ajax({async:true,
                    data:{Consulta},
                    dataType:'html', 
                    success:function (data, textStatus) {
                        var datos = $.parseJSON(data);
                        for(var d in datos.Records){
                            series2.push([datos.Records[d].tipo,parseInt(datos.Records[d].total,10)]);
                        }
                        cargarGrafica();
                    }, 
                    type:'post', 
                    url:'<?php echo $this->base;?>/charts/reconsgenero'
                });
            }, 
            type:'post', 
            url:'<?php echo $this->base;?>/charts/consgenero'
        });


    }
    function cargarGrafica(){
        var txt = 'Total de Consultas y Reconsultas por Género, desde ' + $('#FechaInicial').val() + ' a '+$('#FechaFinal').val();
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Servicio prestado en la Clínica'
        },
        subtitle: {
            text: txt
        },
        xAxis: {
            categories: [
                'Consultas',
                'Reconsultas'
            ]
        },
        yAxis: [{
            min: 0,
            title: {
                text: 'Total de Visitas'
            }
        }],
        legend: {
            enabled: true,
            shadow: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{y}'
                }
            }
        },
        tooltip: {
            shared: true
        },
        plotOptions: {
            column: {
                grouping: false,
                shadow: false,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Masculino',
            color: 'rgba(165,170,217,1)',
            data: series,
            pointPadding: 0.3,
            pointPlacement: 0
        }, {
            name: 'Femenino',
            color: 'rgba(126,86,134,.9)',
            data: series2,
            pointPadding: 0.4,
            pointPlacement: 0
        }]
    });
  }
</script>