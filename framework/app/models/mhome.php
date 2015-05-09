<?php /**
* @author Andreu Sanz Miedes
* @author asanzm.sanz@gmail.com
* @copyright 2015 M7
* @version 1.0
* 
*/

final class mHome extends Model
{
    
    
    
    function __construct($params)
    {
        parent::__construct($params);
        $this->db       = DB::singleton();
        // a litle prove in--->out
        $this->data_out = $params;
    }
    function get_out()
    {
        return $this->data_out;
    }
    
 
   
    function insert($dni, $nombre, $nusuario, $telefono, $direccion, $poblacion, $email, $password, $rpassword)
    {
        if($this->dni($dni) && $this->email($email)){
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