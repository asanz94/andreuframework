<?php /**
* @author Andreu Sanz Miedes
* @author asanzm.sanz@gmail.com
* @copyright 2015 M7
* @version 1.0
*/

	class Controller {
		protected $model;
		protected $view;
		protected $params;
		protected $conf;
		function __construct($params){
			$this->params=$params;
			$this->conf=Registry::getInstance();
			
		}

		function ajax_set($output){
			ob_clean();
			$resp=json_encode($output);
			echo $resp;
		}
	}

