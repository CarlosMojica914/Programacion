<!DOCTYPE html>
<html>
<head>
<video src="img/video.mp4" id="vidFondo"></video>
  <meta charset="utf-8">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/customColors.css" media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.css" media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/index.css" media="screen,projection"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulario</title>
</head>

<body>
<div class="contenedor">

    <div class="card rowTitulo">
      <h2>Proyecto Elaborado por Carlos Mojica</h2>
      </div>
  
    <div class="card rowTitulo">
      <h1>Buscador</h1>
    </div>
    <div class="colFiltros">
      <form id="formulario">
        <div class="filtrosContenido">
          <div class="tituloFiltros">
            <h5>Bienes Raices Carlos Mojica</h5>
          </div>
          <div class="filtroCiudad input-field">
          <label for="selectCiudad"></label>
            <select name="ciudad" id="selectCiudad" class="browser-default">
              <option value="" selected>Elige una ciudad</option>
              <?php
                $data = json_decode(file_get_contents('data-1.json'), true);
                $ciudades = array_unique(array_column($data, 'Ciudad'));
                foreach ($ciudades as $ciudad) {
                  echo "<option value=\"$ciudad\">$ciudad</option>";
                }
              ?>
            </select>
          </div>
          <div class="filtroTipo input-field">
            <label for="selectTipo"></label>
            <select name="tipo" id="selectTipo" class="browser-default">
              <option value="" selected>Elige un tipo</option>
              <?php
                $tipos = array_unique(array_column($data, 'Tipo'));
                foreach ($tipos as $tipo) {
                  echo "<option value=\"$tipo\">$tipo</option>";
                }
              ?>
            </select>
          </div>
          <div class="filtroPrecio">
            <label for="rangoPrecio">Precio:</label>
            <input type="text" id="rangoPrecio" name="precio" value="" />
          </div>
          <div class="botonField">
            <input type="submit" class="btn white
            waves-green" value="Buscar" id="submitButton">
          </div>
        </div>
      </form>
    </div>

    <div class="colContenido">
      <div class="tituloContenido card">
        <h5>Resultados de la búsqueda:</h5>
        <div class="divider"></div>
        <button type="button" name="todos" class="btn-flat waves-effect" id="mostrarTodos">Mostrar Todos</button>
      </div>
      <div id="resultados">
        <!-- Aquí se mostrarán los resultados de la búsqueda -->
      </div>
    </div>
  </div>

  <script type="text/javascript" src="js/jquery-3.0.0.js"></script>
  <script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/index.js"></script>
  
</body>
</html>
