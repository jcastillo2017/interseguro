$(document).ready(function($){

  var dateToday = new Date();

  $("#fechaIda").datepicker({
    minDate: dateToday,
    format: 'dd/mm/yyyy',
    todayHighlight:'TRUE',
    autoclose: true,
  })

  $( "#fechaIda" ).change(function() {
    $( "#fechaRetorno" ).val($( "#fechaIda" ).val());
  });

  $("#fechaRetorno").datepicker({
    minDate: dateToday,
    format: 'dd/mm/yyyy',
    todayHighlight:'TRUE',
    autoclose: true,
  })



});


function buscarDestinos(){

  destinoBuscar = $( "#destino" ).val();

  if (destinoBuscar.length > 3) {
    $.ajax({
      //data:  parametros,
      url:   'https://testsoat.interseguro.com.pe/talentfestapi/destinos/'+destinoBuscar,
      type:  'get',
      dataType: 'json',
      beforeSend: function () {
        console.log(destinoBuscar);      
      },
      success:  function (data) {
        autocompletarDestino(data); 
      },
      error: function(data){
        console.error("Fallo en la consulta");
      }
    });  
  }

}

function autocompletarDestino(destinos){

  var sugerencias = [];

  for(i = 0; i < destinos.length; i++) {
    sugerencias.push(destinos[i]);
  }

  $( "#destino" ).autocomplete({
    source: sugerencias
  });
}


function enviarFiltros(){

  destino         = $( "#destino" ).val();
  numeroPasajeros = $( "#numeroPasajeros" ).val();
  fechaIda        = $( "#fechaIda" ).val();
  fechaRetorno    = $( "#fechaRetorno" ).val();

  //console.log(destino + ' - ' + numeroPasajeros + ' - ' + fechaIda + ' - ' + fechaRetorno);

  var parametros = {
      "destino" : destino,
      "fecha_partida" : fechaIda,
      "fecha_retorno" : fechaRetorno,
      "cantidad_pasajeros" : numeroPasajeros};

  $.ajax({
    data:  parametros,
    url:   'https://testsoat.interseguro.com.pe/talentfestapi/cotizacion',
    type:  'post',
    dataType: 'json',
    beforeSend: function () {
      console.log(parametros);      
    },
    success:  function (data) {
      console.log(data);
      $("#resultadosBusqueda").empty();
      resultadosFormato   = formatearResultados(data);
      $("#resultadosBusqueda").html(resultadosFormato);
    },
    error: function(data){
      console.error("Fallo en la consulta");
    }
  });

}

function formatearResultados(response) {
  
  var i;
  var salida = "";

  cabecera = '<table class="table table-striped" width="100%">'+
              '<thead><tr class="table-primary">'+
                '<th scope="col"></th>'+
                '<th align="center">'+ response[0].tipo_plan + '<br> $ ' + response[0].precio_plan + '</th>' +
                '<th align="center">'+ response[1].tipo_plan + '<br> $ ' + response[1].precio_plan + '</th>' +
                '</tr>'+
              '</thead><tbody>';

  //console.log(response[0].caracteristicas[0]);

  for(i = 0; i < 6; i++) {
    salida += '<tr>'+
              '<th scope="row">'+ response[0].caracteristicas[i].caracteristica +'</th>'+
              '<td align="center"><span class="glyphicon glyphicon-'+ response[0].caracteristicas[i].aplica +' fg-azul"></span></td>'+
              '<td align="center"><span class="glyphicon glyphicon-'+ response[1].caracteristicas[i].aplica +' fg-azul"></span></td>'+
            '</tr>';
  }

  salida += '</tbody></table>';

  return cabecera + salida; 
}
