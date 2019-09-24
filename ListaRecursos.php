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
	<div class="container col-lg-9 mb-5 mt-5" >
	<div class="col-md-12" style="border-width: 1px 1px 1px 1px; border-style: solid; border-color: lightgray;">
		<h3 class="mt-3 text-center mb-2">Recursos Estudiantiles</h3>
	<form enctype="multipart/form-data" action="Acciones/GuardarRecurso.php" method="post">
		<div class="form-row mt-3">
			<div class="col-lg-4">
				<label>Titulo:</label>
				<input type="text" name="txtTitulo" size="30" class="form-control">
			</div>
			<div class="col-lg-6">
				<label>Descripcion:</label>
				<input type="text" name="txtDescripcion" size="30" class="form-control">
			</div>
			
		</div>
		<div class="form-row mb-3">
				<div class="col-lg-4">
					<label>Seleccione un archivo:</label>
					<input type="file" name="archivo" class="form-control">
				</div>
				<?php  
			$asignaturaID=$_GET['AsignaturaID'];?>
				<div class="col-lg-4 mt-4">
					<input type="number" name="txtIdentificador" id="txtIdentificador" value="<?php echo $asignaturaID;?>" style="display: none;">
					
				</div>
				<div class="col-lg-4" style="margin-top: 25px;">
					<button class="btn btn-primary  " type="submit" style="border-radius: 20px">Subir Archivo</button>
				</div>	
			</div>
		
	</form> 


	
			<div class="col-md-12 table-responsive">
				<table class="table table-bordered">
				<thead>
				   	<tr>
 						<th>Nombre</th>
 						<th>Descripcion</th>
 						<th>Opciones</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php 
 						$consulta = "SELECT recursoID,nombreArchivo, Descripcion, tipo from tbl_recursosestudiantiles where asignaturaID=".$asignaturaID;
 						$resultado = $conexion->ejecutarconsulta($consulta);
 						$bandera=mysqli_num_rows($resultado);
 						if($bandera!=0){
 							while($arreglo = $resultado->fetch_array()){
 								 echo '<td>'.$arreglo['nombreArchivo'].'</td>';
 								 echo '<td>'.$arreglo['Descripcion'].'</td>';
 								 echo '<td><a class="btn btn-primary mr-2" href="Archivos/'.$arreglo['nombreArchivo'].'" style="border-radius: 20px"><i class="glyphicon glyphicon-remove">Descargar</a><button class="btn btn-danger" onclick="eliminarRecurso('.$arreglo['recursoID'].')" style="border-radius: 20px"><i class="glyphicon glyphicon-remove">Eliminar</button></td></tr>';

 							}
 						}else{
 							echo "<tr><td colspan=4 ><p style=\"text-align:center\">Aun no hay recursos en la plataforma</p></td>";
 						}

 					?>
 				</tbody>
 			</table>
 			</div>		

	</div>
	<a href="RecursosEstudiantiles.php" ><button class=" btn btn-primary mb-2 mt-2" style="border-radius: 20px">Regresar</button></a>
	</div>



<footer class="py-5 mw-100 bg-dark " style="position: absolute; width: 100%;">
	<div class="container">
		<p class="text-center text-white">Copyright &copy; Learn With Me 2019</p>
	</div>
			<!-- /.container -->
</footer>
<script type="text/javascript">
		function eliminarRecurso(recursoID){
      if (confirm("Realmente desea eliminar este archivo?")) {
        window.location.href= "Acciones/eliminarRecurso.php?recursoID="+recursoID;
        } else {

      }
	}
	</script>
</body>
</html>