<?php /**
* @author Andreu Sanz Miedes
* @author asanzm.sanz@gmail.com
* @copyright 2015 M7
* @version 1.0
*/
	class Modificar extends Controller{
		
		function __construct(){
			parent::__construct($this->params);
			$this->conf=Registry::getInstance();

			$this->model=new mModificar;
			$this->view=new vModificar;
		}
		function home(){
						echo "Pagina generadada en ".(microtime() - $this->conf->time)." segundos";	
		

    /**
    * 
    * @return esta funcion llama al metodo modificar el cual si nos retorna true 
    * redirigimos a la pagina modificado correctamente
    *o por el contrario a la pagina de error
    */

		function modificar(){
		if(isset($_POST['email'])){ 
        $nombre=filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
		    $nusuario=filter_input(INPUT_POST, 'nusuario', FILTER_SANITIZE_STRING);
        $telefono=filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);
        $direccion=filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);          
        $poblacion=filter_input(INPUT_POST, 'poblacion', FILTER_SANITIZE_STRING);
        $email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $password=md5(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
        $rpassword=md5(filter_input(INPUT_POST, 'rpassword', FILTER_SANITIZE_STRING));
        $user=$this->model->modificar($nombre,$nusuario,$telefono,$direccion,$poblacion,$email,$password,$rpassword);
         
         if ($user==TRUE){
               // cap a la pàgina principal
               header('Location:'.APP_W.'modificarc');
               //echo $email;
         }
         else{
             // no hi és l'usuari, cal registrar
               header('Location:'.APP_W.'error');
             }
  		  }
		}

	}