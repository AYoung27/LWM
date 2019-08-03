<!DOCTYPE html>
<html>
<head>
	<title>Learn With Me</title>
	<link rel="stylesheet" type="text/css" href="Estilos/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Estilos/fonts/awesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="Estilos/css/Estilos.css">
	<link rel="icon" href="img/favicon3.png" >
	<meta charset="utf-8">
	<style type="text/css">
		
	</style>
</head>
<body>
	<div class="container" id="div-contenedor">
		<div  id="div-recuadro">
			<div class="form-singin" id="otrodiv">
				<div id="div-logo" >
					<img src="img/learn 1.jpg" height="50">
				</div>
				<div class="container">
					<div class="d-flex justify-content-center h-100">
						<div class="card">
							<div class="card-header">
								<h3>Inicia Sesion</h3>
							</div>
							<div class="card-body">
								<form method="post" action="Acciones/iniciarSesion.php">
									<div class="input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-user"></i></span>
										</div>
										<input type="email" id="inputEmail" name="txtCorreo" class="form-control" placeholder="Correo">

									</div>
									<div class="input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-key"></i></span>
										</div>
										<input type="password" id="inputPassword" name="txtPassword" class="form-control" placeholder="password">
									</div>
									<div class="row align-items-center remember">
										<input type="checkbox">Recuerdame
									</div>
									<div class="form-group">
										<input type="submit" value="Login" class="btn btn-sm btn-dark float-right ">
									</div>
								</form>
							</div>
							<div class="card-footer">
								<div class="d-flex justify-content-center">
									<a href="#">Has olvidado tu contraseña?</a>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
			
		</div>

	</body>
	</html>