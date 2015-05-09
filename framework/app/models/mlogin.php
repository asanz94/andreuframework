<?php /**
* @author Andreu Sanz Miedes
* @author asanzm.sanz@gmail.com
* @copyright 2015 M7
* @version 1.0
*/

	class mLogin extends Model{

		function __construct(){
			parent::__construct();
		}

		/**
    * 
    * @return this function return true si el rol del usuario existe, por el contrario si no existe
    * retorna false
    */

		   public function rol($nusuario)
    {
        try {
            $sql   = "SELECT rol FROM usuarios WHERE nom_usuario=? ";
            $query = $this->db->prepare($sql);
            $query->bindParam(1, $nusuario);
            $query->execute(); //fetch per rol

            if ($query->rowCount() == 1) {
                $fetch           = $query->fetchColumn();
                $_SESSION['rol'] = $fetch;
                $rol= $_SESSION['rol'];
                setcookie("rol",$rol, time() + 360000);
                return TRUE;
            } else {
                //Session::set('islogged',FALSE);
                $_SESSION['rol'] = "Error";
                return FALSE;
            }
            
            
        }
        catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
        
    }
    
    
    /**
    * 
    * @return this function return true si el usuario existe, por el contrario si no existe
    * retorna false
    */

    function login($nusuario, $password)
    {
        try {

            $sql   = "SELECT * FROM usuarios WHERE nom_usuario=? AND contrasenya=?";
            $query = $this->db->prepare($sql);
            $query->bindParam(1, $nusuario);
            $query->bindParam(2, $password);
            $query->execute(); //fetch per rol
            if ($query->rowCount() == 1) {
                
                $_SESSION['user']  = $_REQUEST['usuario'];
                $this->rol($nusuario);
                $usucookie=$_SESSION['user'];
                setcookie("usuario",$usucookie,time() + 360000);
                return TRUE;
                
            } else {
                //Session::set('islogged',FALSE);
                return FALSE;
            }
        }
        catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
    }
		
	}