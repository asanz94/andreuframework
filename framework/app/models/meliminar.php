<?php /**
* @author Andreu Sanz Miedes
* @author asanzm.sanz@gmail.com
* @copyright 2015 M7
* @version 1.0
*/
	class mEliminar extends Model{


    /**
    * 
    * @return this function return true si la sentencia se ha ejecutado correctamente
    *, por el contrario si no existe
    * retorna false
    */


 function eliminar($nusuario,$password){
  try{
$sql = "DELETE FROM usuarios WHERE nom_usuario = ? AND contrasenya =?";
/* Ejecutar la sentencia */
   $query=$this->db->prepare($sql);
     $query->bindParam(1,$nusuario);
     $query->bindParam(2,$password);
     $query->execute();//fetch per rol

     if($query->rowCount()==1){
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