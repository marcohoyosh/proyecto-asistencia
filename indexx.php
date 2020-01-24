<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<div class="container">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <div class="page-header text-left">
      <h1>Combobox (select) dinámicos <small>Con Php, Mysql y Jquery (Ajax)</small></h1>
    </div>
    <div class="alert alert-info" role="alert">Ejemplo de 2 selects</div>
    <p>Elige un vídeo según la lista de reproducción:</p>
    <div class="row">
      <div class="col-md-4">
          <p>Lista de reproducción
          <select id="lista_reproduccion" name="lista_reproduccion" class="form-control">
          </select>
        </p>
      </div>
      <div class="col-md-4">
        <p>Vídeos
        <select id="videos" name="video" class="form-control">
        </select>
      </p>
      </div>
      <div class="col-md-4">
        <p><br><button id="enviar" type="submit" class="btn btn-default btn-block">Enviar</button></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <p><b>El resultado es: </b></p><p id="resultado1"></p>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
  </script>
  <script type="text/javascript" src="js/index.js"></script>, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>