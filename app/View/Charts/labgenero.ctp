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
                cargarGrafica();
            }, 
            type:'post', 
            url:'<?php echo $this->base;?>/charts/conslabgenero'
        });
    }
    function cargarGrafica(){
        var txt = 'Total de Laboratorios desde ' + $('#FechaInicial').val() + ' a '+$('#FechaFinal').val();
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Servicio prestado en el Laboratorio'
        },
        subtitle: {
            text: txt
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total de Visitas'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y}'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style=\"font-size:11px\">{series.name}</span><br>',
            pointFormat: '<span style=\"color:{point.color}\">{point.name}</span>: <b>{point.y}</b> de Total<br/>'
        },

        series: [{
            name: 'Servicio',
            colorByPoint: true,
            data: series
        }]
    });
  }
</script>