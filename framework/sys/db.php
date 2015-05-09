<?php /**
* @author Andreu Sanz Miedes
* @author asanzm.sanz@gmail.com
* @copyright 2015 M7
* @version 1.0
*/
	class DB extends PDO{

			static $_instance;

			public function __construct()
            {
                    $config = Registry::getInstance();
                    try{
                        parent::__construct($config->driver.':host=' . $config->dbhost . ';dbname=' .$config->dbname,$config->dbuser, $config->dbpass);}
                    catch (PDOException $e) {
                     echo $e->getMessage();
                 }

            }

			static function singleton(){
				if(!(self::$_instance) instanceof self){
					self::$_instance=new self();
				}
				return self::$_instance;
			}
	}