<?php /**
* @author Andreu Sanz Miedes
* @author asanzm.sanz@gmail.com
* @copyright 2015 M7
* @version 1.0
*/


if(isset($_SESSION['rol']) ){
$menu = '<div id="menu"><div><a href="'.APP_W.'home">Inicio</a></div>';

if($_SESSION['rol']==1){
	$menu.= '<div><a href="'.APP_W.'reg">Insertar</a></div>
	<div><a href="'.APP_W.'modificar">Modificar</a></div>
	<div><a href="'.APP_W.'regeliminar">Eliminar</a></div>';
}else{
	$menu.= '<div><a href="'.APP_W.'modificar">Modificar</a></div>
	<div><a href="'.APP_W.'modificar">Reservar</a></div>
	<div><a href="'.APP_W.'modificar">Ver pedido</a></div>
	<div><a href="'.APP_W.'contacta">Contacta</a></div>';

}



$menu.= '<div>Bienvenido '.$_SESSION['user'].'&nbsp;<a href="'.APP_W.'home/Salir">Cerrar Sesion </a></div></div>';
echo $menu;
}


?>