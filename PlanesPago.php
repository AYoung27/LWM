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

  <style type="text/css">
    #divCard{
      -webkit-transform:scale(1,1);
      -webkit-transition-duration:100ms;
    }

    #divCard:hover{
      -webkit-transform:scale(1.12,1.12);
      -webkit-transition-duration:100ms;
    }
  </style>
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
 
  <div class="text-center mt-4"> 
      <h3>Potencia tu institucion </h3>
      <p style="font-size: 12px;" class="m-0">Obten acceso a todas las herramientas que Learn With me te ofrece.</p>
      <p style="font-size: 12px;">Escoge el plan que mejor se adecue a tus necesidades</p>
  </div>
  <div class="container mt-5">

    <?php 
      $consulta="SELECT PlanID,NombrePlan, Precio, numeroCursos, numeroSeccionesCurso, numeroAlumnos, numeroDocentes FROM tbl_planes WHERE precio=20 or precio=30 or precio=70";
      $resultado=$conexion->ejecutarconsulta($consulta);
     ?>
    <!-- Heading Row -->
    <div class="row mb-5">
      <?php
      while ($arreglo=$resultado->fetch_array()) {
          # code...    
     echo '<div class="col-lg-4" id="divCard">
        <div class="card bg-light mb-3" style="max-width: 21rem;">
            <div class="card-header text-center">'.$arreglo['NombrePlan'].'</div>
            <div class="card-body text-center">
                <p class="m-0 text-center" style="font-size: 12px;">Detalles del plan</p>
                <p class="card-text text-center" style="font-size: 50px;">$'.$arreglo['Precio'].'</p>
                <p class="card-text text-center">Recursos Estudiantiles: SI</p>
                <p class="card-text text-center">Notificaciones via email: SI</p>
                <p class="card-text text-center">Calificaciones: SI</p>
                <p class="card-text text-center">Numero de maestros: '.$arreglo['numeroDocentes'].'</p>
                <p class="card-text text-center">Numero de Cursos: '.$arreglo['numeroCursos'].'</p>
                <p class="card-text text-center">Numero de Alumnos por curso: '.$arreglo['numeroAlumnos'].'</p>
                <a href="Acciones/actualizarPlan.php?'.$arreglo['PlanID'].'" class="btn btn-primary" style="border-radius: 20px;">Seleccionar plan</a>
           </div>
        </div>
      </div>';
      }
      ?>
    </div>
    <div class="row mb-5">
      <div class="col-lg-12 text-center">
        <a class="btn btn-primary" href="Acciones/CerrarSesion.php" style="border-radius: 20px;">Seleccionar plan en otro Momento</a>
      </div>
        
    </div>
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