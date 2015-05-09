<?php /**
* @author Andreu Sanz Miedes
* @author asanzm.sanz@gmail.com
* @copyright 2015 M7
* @version 1.0
*/
class mInsert extends Model
{
    function __construct(){parent::__construct();}


    /**
    * 
    * @return this function return true si el dni del usuario nuevo ya  existe en nustra
    *bbdd, por el contrario si no existe
    * retorna false
    */


     public function dni($dni)
    {
        try {
            $sql   = "SELECT nif FROM usuarios WHERE nif=? ";
            $query = $this->db->prepare($sql);
            $query->bindParam(1, $dni);
            $query->execute(); //fetch per rol

            if ($query->rowCount() == 1) {
                $fetch           = $query->fetchColumn();
                return TRUE;
            } else {
                return FALSE;
            }
        }
        catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
        
    }

     /**
    * 
    * @return this function return true si el email del usuario nuevo ya  existe en nustra
    *bbdd, por el contrario si no existe retorna false
    * 
    */

    public function email($email)
    {
        try {
            $sql   = "SELECT email FROM usuarios WHERE email=? ";
            $query = $this->db->prepare($sql);
            $query->bindParam(1, $email);
            $query->execute(); //fetch per rol

            if ($query->rowCount() == 1) {
                $fetch           = $query->fetchColumn();
                return TRUE;
            } else {
                return FALSE;
            }
        }
        catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
        
    }

     
     /**
    * 
    * @return this function return true si realiza el registro en nustra
    *bbdd, por el contrario si no se ha podido realizar retorna false
    * 
    */


    function insert($dni, $nombre, $nusuario, $telefono, $direccion, $poblacion, $email, $password, $rpassword)
    {
        if($this->dni($dni) || $this->email($email)){
          return FALSE;

        }else{
        try {
            $rol    = 2;
            $sql    = "INSERT INTO usuarios VALUES (";
            $vector = array($dni,$rol,$nombre,$nusuario,$telefono,$direccion,$poblacion,$email,$password,$rpassword);
            $max    = sizeof($vector);
            for ($i = 1; $i <= $max; $i++) {
                if ($i != $max) {
                    $sql .= "'" . $vector[$i - 1] . "',";
                } else {
                    $sql .= "'" . $vector[$i - 1] . "')";
                }
            }
            $query = $this->db->prepare($sql);
            $query->execute();
            // COMPROBAR CONSULTAS
            // Coder::code($sql);
            // die;
            if ($query->rowCount() == 1) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }

      }

    }
}