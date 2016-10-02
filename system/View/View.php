<?php

namespace system\core\View;

use system\core\Controller\BaseController as BaseController;

class View extends BaseController
{
	protected static $variables = array();
    
	public static function load($filename, $vars=false)
	{
		if($vars == true){
			foreach ($vars as $key => $value) {
				self::$variables[$key] = $value;
			}

			extract(self::$variables);	
		}
		
        include './app/View/'.$filename.'.php';

	}

}