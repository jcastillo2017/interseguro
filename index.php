<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <title>Interseguro - Seguros de viaje</title>
    <meta name="Description" 
    content="">
    <meta name="keywords" content="Interseguro - Seguros de viaje">
    <meta name="author" content="Interseguro - Seguros de viaje">

    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="js/busqueda.js"></script>

  </head>

  <body>

    <header >
      <div class="container-fluid bg-azul" >
        <div class="container" >
          <div class="row">
            <div class="col-md-3">
              <a class="" href="/">
                <img src="img/interseguro-logo.png" alt="Interseguro">
              </a>
            </div>
            
          </div>
        </div>
      </div>
    </header>

    <div class="container" >
      <div class="row">
          <div class="col-md-12 col-sm-12">
            <br>
            <h2>Cotizador de seguro de viajes</h2>
          </div>
      </div>

      <form>
        <div class="row">
          <div class="col-sm-6">
            Destino:
            <br>
            <input type="text" name="destino" id="destino" class="form-control" oninput="buscarDestinos()" required>
            <!--<select class="form-control" name="destino">
              <option value="volvo">Volvo</option>
              <option value="saab">Saab</option>
              <option value="mercedes">Mercedes</option>
              <option value="audi">Audi</option>
            </select> -->
          </div>
          <div class="col-sm-6">
            Número de pasajeros:
            <br>
            <input type="number" name="numeroPasajeros" id="numeroPasajeros" class="form-control" required> 
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            Fecha de partida:
            <br>
            <div class="input-group date">
                <input type="text" class="datepicker form-control" name="fechaIda" id="fechaIda" value="" data-date-format="dd/mm/yyyy" required>
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar fg-azul"></span>
                </div>
            </div>
          </div>

          <div class="col-sm-6">
            Fecha de retorno:
            <br>
            <div class="input-group date">
                <input type="text" class="datepicker form-control" name="fechaRetorno" id="fechaRetorno" value="" data-date-format="dd/mm/yyyy" required>
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar fg-azul"></span>
                </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-8">
          </div>
          <div class="col-sm-12 col-lg-4">
            <br>
            <button type="button" class="btn btn-primary btn-block" onclick="enviarFiltros();">Cotizar</button>
          </div>
        </div>
      </form>

      <div class="row" class="hidden" id="txtResultado">
          <div class="col-md-12 col-sm-12">
            <br>
            <h2>Resultados</h2>
          </div>
      </div>

      <div class="" id="resultadosBusqueda">

        <!--<table class="table table-responsive">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Plan Estandar</th>
              <th scope="col">Plan Premium</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Cobertura 1</th>
              <td><span class="glyphicon glyphicon-ok fg-azul"></span></td>
              <td><span class="glyphicon glyphicon-remove fg-azul"></span></td>
            </tr>
          </tbody>
        </table>-->
      </div>

    </div>

    <p>&nbsp;</p>
  </body>
</html>
