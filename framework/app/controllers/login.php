<?php /**
* @author Andreu Sanz Miedes
* @author asanzm.sanz@gmail.com
* @copyright 2015 M7
* @version 1.0
*/
	class Login extends Controller{
		
		function __construct(){
			parent::__construct($this->params);
			$this->conf=Registry::getInstance();

			$this->model=new mlogin;
			$this->view=new vlogin;
		}
		function home(){
						echo "Pagina generadada en ".(microtime() - $this->conf->time)." segundos";
						
		}

		  /**
    * 
    * @return esta funcion llama al metodo login el cual si nos retorna true 
    * redirigimos a la home o por el contrario al formulario de registro
    */

		function login(){
		if(isset($_POST['usuario'])){
         $nusuario=filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
         $password=md5(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
         $user=$this->model->login($nusuario,$password);
         if ($user== TRUE){
               // cap a la pàgina principal
               
               header('Location:'.APP_W.'home');
              
               //echo $email;
         }
         else{
             // no hi és l'usuari, cal registrar
               header('Location:'.APP_W.'reg');
             }
  		  }
		}
	}