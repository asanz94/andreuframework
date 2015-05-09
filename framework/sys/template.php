<?php /**
* @author Andreu Sanz Miedes
* @author asanzm.sanz@gmail.com
* @copyright 2015 M7
* @version 1.0
*/
	class Template{
		
		static function load($contents,$data=null){
			if(is_array($data)){
				extract($data);
			}

		include APP.'tpl/head.php';
		include APP.'tpl/header.php';		
		include APP.'tpl/menu.php';
		include APP.'tpl/'.$contents.'.php';
		include APP.'tpl/footer.php';
		}
			
	}
