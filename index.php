<?php 
session_start();
include("Clases/Conexion.php");
$conexion = new Conexion();
$conexion->mysql_set_charset("utf8");
if (empty($_SESSION)) {
  header('Location: Login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Learn With Me</title>
	<link rel="stylesheet" type="text/css" href="Estilos/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="Estilos/fonts/awesome/css/all.css">
  <link rel="icon" href="img/favicon3.png" >
</head>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand pl-3" href="index.php"><img src="img/learn 1.png" height="40"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
      </ul>
      <ul class="navbar-nav mr-2 my-lg-0">
        <li class="nav-item">
          <a href="#"><span class="text-white pr-3"><i class="fas fa-bell"></i></span></a>
        </li>
        <li class="nav-item">
          <a href="#"><span class="text-white pr-3"><i class="fas fa-user"></i></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active p-0" href="Acciones/CerrarSesion.php">Salir</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Heading Row -->
    <div class="row align-items-center my-5">
      <div class="col-lg-7">
        <img class="img-fluid rounded mb-4 mb-lg-0" src="img/UNAHlogo.png" alt="" width="400">
      </div>
      <!-- /.col-lg-8 -->
      <div class="col-lg-5">
        <h1 class="font-weight-light">Universidad Nacional Autonoma de Honduras</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod tenetur ex natus at dolorem enim! Nesciunt pariatur voluptatem sunt quam eaque, vel, non in id dolore voluptates quos eligendi labore.</p>
      </div>
      <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->

    <!-- Call to Action Well -->
    <div class="card text-white bg-secondary my-5 py-4 text-center">
      <div class="card-body">
        <?php
            $consulta="SELECT descripcion, nivelID FROM tbl_anuncios";
            $resultado=$conexion->ejecutarconsulta($consulta);
            while($arreglo=$resultado->fetch_array()){
              echo '<i class="fa fa-warning"></i><p class="text-white ml-2">'.$arreglo['descripcion'].'</p>';
            } 
         ?>
        <p class="text-white m-0"></p>
      </div>
    </div>

    <!-- Content Row -->
    <div class="row">

      <!-- /.col-md-4 -->
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <h2 align="center" class="card-title">Recursos Estudiantiles</h2> 
            <div align="center" style="padding-top: 2px"> <img  src="Img/Tarjetas/T_Recursos2.png" height="auto" width="170px" style="font-size: 1em;" > </div>
            <p class="card-text"><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod tenetur ex natus at dolorem enim! Nesciunt pariatur voluptatem sunt quam eaque, vel, non in id dolore voluptates quos eligendi labore.</p>
          </div>
          <div class="card-footer">
            <a href="RecursosEstudiantiles.php" class="btn btn-primary btn-sm">More Info</a>
          </div>
        </div>
      </div>
      <!-- /.col-md-4 -->

      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <h2 align="center" class="card-title">Asistencia</h2> <br> <br>
            <div align="center"><img  src="Img/Tarjetas/T_Asistencia2.png" height="auto" width="170px" style="font-size: 1em;" ></div>
            <p class="card-text"> <br> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary btn-sm">More Info</a>
          </div>
        </div>
      </div>

      <!-- /.col-md-4 -->
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <h2 align="center" class="card-title">Calificaciones</h2> <br> <br>
            <div align="center"><img  src="Img/Tarjetas/T_Calificaciones2.png" height="auto" width="170px" style="font-size: 1em;" ></div>
            <p class="card-text"><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod tenetur ex natus at dolorem enim! Nesciunt pariatur voluptatem sunt quam eaque, vel, non in id dolore voluptates quos eligendi labore.</p>
          </div>
          <div class="card-footer">
            <a href="Calificaciones.php" class="btn btn-primary btn-sm">More Info</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">

      <!-- /.col-md-4 -->
      <?php 
      if ($_SESSION['TipoUsuario']=='1') {
        # code...
        echo '
        <div class="col-md-4 mb-5">
        <div class="card h-100">
        <div class="card-body">
        <h2 align="center" class="card-title">Gestion de Usuarios</h2> <br> <br>
        <div align="center"> <img  src="Img/Tarjetas/T_Gestion2.png" height="auto" width="170px" style="font-size: 1em;" > </div>
        <p class="card-text"><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
        </div>
        <div class="card-footer">
        <a href="GestionUsuario.php" class="btn btn-primary btn-sm">More Info</a>
        </div>
        </div>
        </div>';

        echo '
        <div class="col-md-4 mb-5">
        <div class="card h-100">
        <div class="card-body">
        <h2 align="center" class="card-title">Gestion de Cursos</h2> <br> <br>
        <div align="center"> <img  src="Img/Tarjetas/T_Gestion4.png" height="auto" width="170px" style="font-size: 1em;" > </div>
        <p class="card-text"><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
        </div>
        <div class="card-footer">
        <a href="GestionCursos.php" class="btn btn-primary btn-sm">More Info</a>
        </div>
        </div>
        </div>';
        
       
      }
      ?>
      <!-- /.row -->

    </div>
    <?php 
        if ($_SESSION['TipoUsuario']=='1') {
          $consulta="SELECT nivelID, Descripcion FROM tbl_nivelanuncio";
          $resultado=$conexion->ejecutarconsulta($consulta);
                    
          # code...
           echo '<div class="container mb-5">
           
            <form action="Acciones/publicarAnuncio.php" method="POST">
            <div class="row mb-3">
              <div class="col-lg-10">
                <label>Puedes publicar un anuncio aqui:</label>
                <textarea rows = "3" name = "descripcion" class="form-control">
                </textarea>
              </div>
            </div>
            <div class="row mb-3">
               <div class="col-md-4">
                <label>Seleccione un nivel de prioridad para el anuncio:</label>
                <select class="custom-select" name="slcNivel">
                    <option selected>Elija un nivel</option>';
                    while($arreglo=$resultado->fetch_array()){
                        echo "<option value=".$arreglo['nivelID'].">".$arreglo['Descripcion']."</option>";
                      }
                    echo '
                </select>
               </div>
            </div>
            <div class="row ml-2">
                <button type="submit" class="btn btn-primary">Publicar anuncio</button>
            </div>   
            </form>
           
        </div>';
        }
     ?>
  </div>

  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 mw-100 bg-dark">
    <div class="container">
      <p class="text-center text-white">Copyright &copy; Learn With Me 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>