<?php
require './clases/conexion.php';
//echo $_REQUEST['usuario']."<br>";
//echo $_REQUEST["contraseña"];
$sql = "select * from v_usuarios where aliasusuarioalias = '". $_REQUEST['usuario'] . "' and contrasenausuariocontrasena = '". $_REQUEST['contraseña']."'";
$resultado = consultas::get_datos($sql);
session_start();
if($resultado[0]['codigousuariocodigo'] == null) {
    $_SESSION['error'] = 'Datos incorrectos';
    header('Location:index.php');
}else{
    $_SESSION['codigousuariocodigo'] = $resultado[0]['codigousuariocodigo'];
    $_SESSION['aliasusuarioalias'] = $resultado[0]['aliasusuarioalias'];
    $_SESSION['fotousuariofoto'] = '';
    $_SESSION['nombres'] = $resultado[0]['empleado'];
    $_SESSION['cargo'] = $resultado[0]['nombrecargonombre'];
    $_SESSION['sucursal'] = $resultado[0]['nombresucursalnombre'];
    header('location:menu.php');
}
