<?php  
include("../Clases/Conexion.php");
$conexion = new Conexion();
$conexion->mysql_set_charset("utf8");
session_start();
   $salida="<div class='col-md-12 table-responsive'>
            <table class='table table-bordered'>
    			<thead>
    				<tr id='titulo'>
    					<th>Nombre</th>
    					<th>Apellido</th>
                        <th>Cedula</th>
                        <th>Telefono</th>
    					<th>Opciones</th>
    				</tr>

    			</thead>
    	<tbody>";
	if(isset($_POST['consulta'])){
		$sql="SELECT tbl_usuarios.usuarioID, nombre, apellido, cedula,telefono, tipoUsuarioID from tbl_usuarios,tbl_docentes WHERE tbl_usuarios.usuarioID=tbl_docentes.usuarioID and tipoUsuarioID=2 AND tbl_docentes.institucionID=".$_SESSION['Institucion']." and nombre like '%".$_POST['consulta']."%'";
	}
	$resultado=$conexion->ejecutarconsulta($sql);
	if ($conexion->cantidadregistros($resultado)>0) {
    	

    	while ($arreglo = $resultado->fetch_assoc()) {
    		$salida.='<tr>
    					<td>'.$arreglo['nombre'].'</td>
    					<td>'.$arreglo['apellido'].'</td>
                        <td>'.$arreglo['cedula'].'</td>
                        <td>'.$arreglo['telefono'].'</td>
    					<td><a role="button"'.'class='.'"btn btn-block btn-primary mr-2 mb-2"'.'href="#"'.' onclick="modificar('.$arreglo["usuarioID"].')"><i class='.'"glyphicon glyphicon-pencil"'.'></i>&nbsp;Modificar</a><a role="button" class='.'"btn btn-danger btn-block mb-2"'.' href="#" onclick="eliminarDocente('.$arreglo["usuarioID"].')"><i class='.'"glyphicon glyphicon-remove"'.'></i>&nbsp;Eliminar</a></td></tr>';
    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="<tr><td colspan='5' style='text-align:center'>Aun no hay docentes registrados</td></tr></div>";
    }


    echo $salida;

    mysqli_close($conexion->getLink());

?>