<?php /**
* @author Andreu Sanz Miedes
* @author asanzm.sanz@gmail.com
* @copyright 2015 M7
* @version 1.0
*/
	class Regeliminar extends Controller{
		
		function __construct(){
			parent::__construct($this->params);
			$this->conf=Registry::getInstance();

			$this->model=new mRegeliminar;
			$this->view=new vRegeliminar;
		}
		function home(){
						echo "Pagina generadada en ".(microtime() - $this->conf->time)." segundos";

			
			
		}
	}