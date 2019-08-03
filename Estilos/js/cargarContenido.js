/*function cargarDiv(divID, ruta) {
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


------------------------------------------------------
FUNCION PARA TABLA Productos
--------------------------------------------------------

    function listar(consulta){
      $.ajax({
        url:'Acciones/BusquedaDocentes.php',
        type:'POST',
        dataType:'html',
        data:{consulta: consulta}
      }).done(function(respuesta){
        alert(respuesta);
        $("#Docente").html(respuesta);
      });
    }

    function eliminar(idProducto){
      if (confirm("Realmente desea eliminar el preducto?")) {
        window.location.href= "Acciones/eliminarDatosProducto.php?idProducto="+idProducto;
      }
    }

function modificar(idProducto){
  $.ajax({
    url:'Contenido/modificarDocente.php',
    type: 'POST',
    dataType:'text',
    data:'idProducto='+idProducto
  }).done(function(res){
    $('#zonaContenido').html(res);
  });
}

function confirmar(){
   if (confirm("Realmente desea modificar el preducto?")) {
        window.location.href= "Acciones/modificarDatosProducto.php";
      } else {
      window.location.href= "perfil.php";
}

  }

*/