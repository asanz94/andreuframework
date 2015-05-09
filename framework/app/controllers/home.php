<?php /**
* @author Andreu Sanz Miedes
* @author asanzm.sanz@gmail.com
* @copyright 2015 M7
* @version 1.0
*/

	final class home extends Controller{
		
		function __construct($params){
			parent::__construct($params);
			$this->conf=Registry::getInstance();
			$this->model=new mHome($params);
			$this->view=new vHome;
		}
		function home(){
			//we can comprove that we pass the parameters
			//var_dump($this->params);
			//echo "   Action";
			//Accedim a valors de configuració
			//Coder::code_var($this->model->get_out());

		//	echo "Pagina generadada en ".(microtime() - $this->conf->time)." segundos";

			
		}

		// function insert(){
		// if(isset($_POST['email'])){
  //        $email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
  //        $nombre=filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  //        $password=md5(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
  //        $dni=filter_input(INPUT_POST, 'dni', FILTER_SANITIZE_STRING);
  //        $telefono=filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);
  //        $direccion=filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);
  //        $poblacion=filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);
  //        $nusuario=filter_input(INPUT_POST, 'nusuario', FILTER_SANITIZE_STRING);
  //        $rpassword=filter_input(INPUT_POST, 'rpassword', FILTER_SANITIZE_STRING);
  //        $poblacion=filter_input(INPUT_POST, 'poblacion', FILTER_SANITIZE_STRING);
  //        $user=$this->model->insert($dni,$nombre,$nusuario,$telefono,$direccion,$poblacion,$email,$password,$rpassword);
  //        if ($user== TRUE){
  //              // cap a la pàgina principal
  //              header('Location:'.APP_W.'insert/home');
  //              //echo $email;
  //        }
  //        else{
  //            // no hi és l'usuari, cal registrar
  //              header('Location:'.APP_W.'errorcrear');
  //            }
  // 		  }
		// } 

    /**
    * 
    * @return esta funcion se encarga de destruir las variables de sesion 
    * y redirigir a la pagina home
    */
       function salir(){
        session_destroy();
         header('Location:'.APP_W.'home');
    }
	}