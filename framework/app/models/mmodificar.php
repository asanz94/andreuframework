<?php /**
* @author Andreu Sanz Miedes
* @author asanzm.sanz@gmail.com
* @copyright 2015 M7
* @version 1.0
*/ 

	class mModificar extends Model{
  
		function __construct(){
			parent::__construct();
		}

    /**
    * 
    * @return this function return true si la sentencia se ha ejecutado correctamente
    *, por el contrario si no existe
    * retorna false
    */


 function modificar($nombre,$nusuario,$telefono,$direccion,$poblacion,$email,$password,$rpassword){
  try{
$sql = " UPDATE usuarios SET " ;
$vector = array($nusuario,$telefono,$direccion,$poblacion,$email,$password,$rpassword);          
$vector2 = array('nom_usuario','telefono','direccion','poblacion','email','contrasenya','rpassword');
$max    = sizeof($vector);
            for ($i = 1; $i <= $max; $i++) {
                if ($i != $max) {
                    $sql .=  $vector2[$i - 1] . "="."'";
                    $sql .=  $vector[$i - 1] ."'".",";
                } else {
                    $sql .=  $vector2[$i - 1] . "='";
                    $sql .=  $vector[$i - 1] . "' WHERE nombre='".$nombre."';";
                }
            }
var_dump($sql);
// die;
$sentencia2 = $this->db->prepare($sql);
$sentencia2->execute();


if($sentencia2->rowCount() == 1){
//Session::set('usuario',$email);
/*
$_SESSION['usuario']=$_REQUEST[$email];
$_SESSION['clave']=$_REQUEST[$password];
*/
           return TRUE;

     }
     else {
         //Session::set('islogged',FALSE);
          return FALSE;}
    }catch(PDOException $e){
       echo "Error:".$e->getMessage();
     }
  }
}