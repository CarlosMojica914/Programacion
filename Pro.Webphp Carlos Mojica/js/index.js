$(document).ready(function() {
    $("#rangoPrecio").ionRangeSlider({
      type: "double",
      grid: true,
      min: 0,
      max: 100000,
      from: 2000,
      to: 80000,
      prefix: "$"
    });
  
    function mostrarResultados(data) {
      $("#resultados").html('');
      if (data.length > 0) {
        data.forEach(function(item) {
          $("#resultados").append(`
            <div class='resultado'>
              <p>Dirección: ${item.Direccion}</p>
              <p>Ciudad: ${item.Ciudad}</p>
              <p>Teléfono: ${item.Telefono}</p>
              <p>Código Postal: ${item.Codigo_Postal}</p>
              <p>Tipo: ${item.Tipo}</p>
              <p>Precio: ${item.Precio}</p>
            </div>
          `);
        });
      } else {
        $("#resultados").append("<p>No se encontraron resultados.</p>");
      }
    }
  
    $("#formulario").on('submit', function(event) {
      event.preventDefault();
      $.ajax({
        url: "buscador.php",
        method: "POST",
        data: $(this).serialize(),
        success: function(data) {
          mostrarResultados(data);
        },
        error: function() {
          $("#resultados").html("<p>Hubo un error en la solicitud.</p>");
        }
      });
    });
  
    $("#mostrarTodos").click(function() {
      $.ajax({
        url: "buscador.php",
        method: "POST",
        data: { ciudad: '', tipo: '', precio: '0;100000' },
        success: function(data) {
          mostrarResultados(data);
        },
        error: function() {
          $("#resultados").html("<p>Hubo un error en la solicitud.</p>");
        }
      });
    });
  });
  