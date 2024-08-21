<?php
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Usuario{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($nombre,$apellidos,$login,$iddepartamento,$idtipousuario,$email,$clavehash,$imagen,$usuariocreado,$tipo_turno,$codigo_persona){
	date_default_timezone_set('America/Mexico_City');
	$fechacreado=date('Y-m-d H:i:s');
	$sql="INSERT INTO usuarios (nombre,apellidos,login,iddepartamento,idtipousuario,email,password,imagen,estado,fechacreado,usuariocreado,tipo_turno,codigo_persona) VALUES ('$nombre','$apellidos','$login','$iddepartamento','$idtipousuario','$email','$clavehash','$imagen','1','$fechacreado','$usuariocreado','$tipo_turno','$codigo_persona')";
	return ejecutarConsulta($sql);

}

public function editar($idusuario,$nombre,$apellidos,$login,$iddepartamento,$idtipousuario,$email,$imagen,$usuariocreado,$tipo_turno,$codigo_persona){
	$sql="UPDATE usuarios SET nombre='$nombre',apellidos='$apellidos',login='$login',iddepartamento='$iddepartamento',idtipousuario='$idtipousuario',email='$email',imagen='$imagen' ,usuariocreado='$usuariocreado',tipo_turno='$tipo_turno',codigo_persona='$codigo_persona'    
	WHERE idusuario='$idusuario'";
	 return ejecutarConsulta($sql);

}
public function editar_clave($idusuario,$clavehash){
	$sql="UPDATE usuarios SET password='$clavehash' WHERE idusuario='$idusuario'";
	return ejecutarConsulta($sql);
}
public function mostrar_clave($idusuario){
	$sql="SELECT idusuario, password FROM usuarios WHERE idusuario='$idusuario'";
	return ejecutarConsultaSimpleFila($sql);
}
public function desactivar($idusuario) {
    // Iniciar una transacción
    ejecutarConsulta("START TRANSACTION");

    try {
        // Eliminar el usuario
        $sqlUsuario = "DELETE FROM usuarios WHERE idusuario = '$idusuario'";
        ejecutarConsulta($sqlUsuario);

        // Confirmar la transacción
        ejecutarConsulta("COMMIT");

        return true; // O cualquier valor de éxito que uses en tu aplicación
    } catch (Exception $e) {
        // En caso de error, revertir la transacción
        ejecutarConsulta("ROLLBACK");
        throw $e;
    }
}
public function activar($idusuario){
	$sql="UPDATE usuarios SET estado='1' WHERE idusuario='$idusuario'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idusuario){
	$sql="SELECT * FROM usuarios WHERE idusuario='$idusuario'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros
public function listar(){
	$sql="SELECT usuarios.idusuario,usuarios.nombre,usuarios.apellidos,usuarios.login,usuarios.email,usuarios.imagen,usuarios.tipo_turno,usuarios.fechacreado,usuarios.estado, departamento.nombre AS nombre_departamento 
	FROM usuarios INNER JOIN departamento ON usuarios.iddepartamento = departamento.iddepartamento";
	return ejecutarConsulta($sql);
}




public function listare(){
	$sql="SELECT * from usuarios";
	return ejecutarConsulta($sql);
}

public function cantidad_usuario(){
	$sql="SELECT count(*) nombre FROM usuarios";
	return ejecutarConsulta($sql);
}

//Función para verificar el acceso al sistema
public function verificar($login, $clave)
{
    $sql = "SELECT u.codigo_persona, u.idusuario, u.nombre, u.apellidos, u.login, u.idtipousuario, u.iddepartamento, u.email, u.imagen, u.login, tu.nombre as tipousuario, d.nombre as nombre_departamento 
            FROM usuarios u
            INNER JOIN tipousuario tu ON u.idtipousuario = tu.idtipousuario
            INNER JOIN departamento d ON u.iddepartamento = d.iddepartamento
            WHERE u.login = '$login' AND u.password = '$clave' AND u.estado = '1'";
    return ejecutarConsulta($sql);
}
}

?>
