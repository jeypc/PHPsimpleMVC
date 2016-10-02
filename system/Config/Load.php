<?php

namespace system\core\Config;

class Load {

	public static function method(){
		self::escapemagicquote();

		if(isset($_GET['c'])) {

			$controller = ucfirst($_GET['c']);

			if(class_exists('\app\Controller\\'.$controller.'Controller')) {
				if(isset($_GET['m'])){

					$method = strtolower($_GET['m']);

					if(method_exists('app\Controller\\'.$controller.'Controller', $method)) {
						echo call_user_func(array('\app\Controller\\'.$controller.'Controller', $method));
					} else {
						echo 'Page Not Found 404';
					}
				} else {
					echo call_user_func(array('\app\Controller\\'.$controller.'Controller', 'index'));	
				}

			} else {
				echo 'Page Not Found 404';
			}
		} else {
			echo call_user_func(array('\app\Controller\HomeController', 'index'));	
		}
	}

	private static function escapemagicquote(){
		if (get_magic_quotes_gpc() === 1)
		{
		    $_GET = json_decode(stripslashes(preg_replace('~\\\(?:0|a|b|f|n|r|t|v)~', '\\\$0', json_encode($_GET, JSON_HEX_APOS | JSON_HEX_QUOT))), true);
		    $_POST = json_decode(stripslashes(preg_replace('~\\\(?:0|a|b|f|n|r|t|v)~', '\\\$0', json_encode($_POST, JSON_HEX_APOS | JSON_HEX_QUOT))), true);
		    $_COOKIE = json_decode(stripslashes(preg_replace('~\\\(?:0|a|b|f|n|r|t|v)~', '\\\$0', json_encode($_COOKIE, JSON_HEX_APOS | JSON_HEX_QUOT))), true);
		    $_REQUEST = json_decode(stripslashes(preg_replace('~\\\(?:0|a|b|f|n|r|t|v)~', '\\\$0', json_encode($_REQUEST, JSON_HEX_APOS | JSON_HEX_QUOT))), true);
		}
	}

}