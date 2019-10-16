<?php 
include("Clases/Conexion.php");
$conexion = new Conexion();
$conexion->mysql_set_charset("utf8");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Learn With Me</title>
	<link rel="stylesheet" type="text/css" href="Estilos/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="Estilos/fonts/awesome/css/all.css">
  <link rel="icon" href="img/favicon3.png" >
</head>
<style type="text/css">
  body{
    background-image: url('img/fondo learn3.jpg');
  }
  #div-contenedor{
  margin-top: 100px;
}

#div-recuadro{

  background-color:#fff;
  border-radius:8px;
  position:relative;
  text-align:center;
  width:950px;
  margin:auto; 
  min-height:650px;
  box-shadow:0 2px 10px rgba(0,0,0,0.45);
}

#otrodiv{
  min-height:400px;
  padding:20px 10px;
}
#div-logo{
  margin: 10px;
}
</style>
<body>

  <!-- Navigation -->

  <!-- Page Content -->

  <div class="container mb-5" id="div-contenedor">
    <div  id="div-recuadro">
        <div id="div-logo" class="mt-4" >
          <img src="img/learn 1.jpg" height="50">
        </div>
        <div class="container ">
            <form action="Acciones/Registrar.php" method="POST">
                <div class="row">
                  <div class="col-lg-6">
                    <p style="font-size:13px;" class="text-center">Proporciona la informacion de la institucion.</p>
                  </div>
                    <div class="col-lg-6">
                    <p style="font-size:13px;" class="text-center">Proporciona la informacion del director o administrador de la institucion.</p>
                  </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-6">
                    <input type="text" name="txtNombreINS" placeholder="Nombre de la institucion" class="form-control">
                  </div>
                  <div class="col-lg-6">
                     <input type="text" name="txtNombreDIRECTOR" placeholder="Nombre del director o administrador" class="form-control">
                  </div>
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-lg-6">
                      <select class="custom-select" name="slcDepartamento">
                        <option selected>Elije un departamento</option>
                        <?php 
                          $consulta="SELECT departamentoID,nombreDepartamento from tbl_departamentos";
                          $resultado=$conexion->ejecutarconsulta($consulta);
                          while ($arreglo=$resultado->fetch_array()) {
                            # code...
                            echo '<option value="'.$arreglo['departamentoID'].'">'.$arreglo['nombreDepartamento'].'</option>';
                          }
                         ?>
                      </select>
                    </div>
                    <div class="col-lg-6">
                         <input type="text" name="txtApellidoDIRECTOR" placeholder="Apellido del director o administrador" class="form-control">
                    </div>
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-lg-6">
                    <select class="custom-select" name="slcMunicipio">
                      <option selected>Elige un municipio</option>
                      <?php 
                          $consulta="SELECT municipioID,nombreMunicipio from tbl_municipios";
                          $resultado=$conexion->ejecutarconsulta($consulta);
                          while ($arreglo=$resultado->fetch_array()) {
                            # code...
                            echo '<option value="'.$arreglo['municipioID'].'">'.$arreglo['nombreMunicipio'].'</option>';
                          }
                         ?>
                    </select>
                    </div>
                    <div class="col-lg-6">
                         <input type="number" name="txtCedula" placeholder="Numero de cedula" class="form-control">
                    </div>
                  </div>
                  <br>
                  <div class="form-row">
                      <div class="col-lg-6"></div>
                      <div class="col-lg-6">
                          <input type="date" name="txtFecha" placeholder="Fecha de Nacimiento" class="form-control">
                      </div>
                  </div>

                  <br>
                  <div class="form-row">
                      <div class="col-lg-6"></div>
                      <div class="col-lg-6">
                        <input type="number" name="txtTelefono" placeholder="Numero de Telefono" class="form-control">
                       </div> 
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6">
                        <input type="email" name="txtCorreo" placeholder="Correo del director o administrador" class="form-control">
                    </div>
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6">
                      <input type="password" name="txtPassword" placeholder="Contraseña" class="form-control">
                    </div>  
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-lg-12">
                      <a href="index.php" class="btn btn-danger">Cancelar</a>
                      <button class="btn btn-primary " type="submit">Registrar</button>
                      
                    </div>  
                  </div>
            </form>
        </div>
      
    </div>
  </div>
  <!-- /.container -->

  <!-- Footer -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>