<?php 
session_start();
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
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand pl-3" href="Principal.php"><img src="img/learn 1.png" height="40"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
			</ul>
			<ul class="navbar-nav mr-2 my-lg-0">

				<li class="nav-item">
					<a class="nav-link active p-0" href="Acciones/CerrarSesion.php">Salir</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container mt-5">
		<h1 class="text-center mb-3">Gestion de Cursos</h1>
		<div class="card">
			<div class="card-header">
				<h3 class="text-center">Cursos</h3>
			</div>
			<div class="card-body">
				<h5 class="card-title">Gestionar cursos</h5>
				<p class="card-text">Agregar o eliminar la informacion de un curso en especifico</p>
				<a href="Cursos.php" class="btn btn-primary float-right" style="border-radius: 20px">Ir</a>
			</div>
		</div>
		<div class="card mt-5 mb-2">
			<div class="card-header">
				<h3 class="text-center">Asignaturas</h3>
			</div>
			<div class="card-body">
				<h5 class="card-title">Gestionar Asignaturas</h5>
				<p class="card-text">Agregar o eliminar la informacion de una asignatura en especifico</p>
				<a href="Asignaturas.php" class="btn btn-primary float-right" style="border-radius: 20px">Ir</a>
			</div>
		</div>
		<a href="Principal.php" ><button class=" btn btn-primary mb-5" style="border-radius: 20px">Regresar</button></a>
	</div>
	<footer class="py-5 mw-100 bg-dark" style=" position: absolute; width: 100%;">
		<div class="container">
			<p class="text-center text-white">s</p>
		</div>
		<!-- /.container -->
	</footer>
</body>
</html>