function listarEstudiantes(consulta){
      $.ajax({
        url:'Acciones/BusquedaEstudiantes.php',
        type:'POST',
        dataType:'html',
        data:{consulta: consulta}
      }).done(function(respuesta){
        $("#Estudiante").html(respuesta);
      });
    }
function modificar(usuarioID){
  $.ajax({
    url:'Contenido/modificarDatosEstudiante.php',
    type: 'POST',
    dataType:'text',
    data:'usuarioID='+usuarioID
  }).done(function(res){
    $('#zonaContenido').html(res);
  });
}

function cargarDiv(divID, ruta) {
  $.ajax({
    url: ruta,
    dataType: 'text',
    success: function (respuesta) {
      document.getElementById(divID).innerHTML = respuesta;
      listar('');
      $.getScript('Estilos/js/script.js');
      mostrarResultados();
    },
    error: function () {
    },
  });
}