<?php /**
* @author Andreu Sanz Miedes
* @author asanzm.sanz@gmail.com
* @copyright 2015 M7
* @version 1.0
*/
	/**
	 *  class View
	 * 	access to registry and loads
	 *  the corresponding template
	 */
	class View{
		protected $reg;
		
		function __construct($contents){
			$this->reg=Registry::getInstance();
			//access to app_data
			$array_app=(array)$this->reg->app_data;
			ob_start();
			Template::load($contents,$array_app);
				
		}
		
	}