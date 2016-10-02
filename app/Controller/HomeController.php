<?php

namespace app\Controller;

use system\core\Controller\BaseController as BaseController;
use system\core\View\View as View;
use app\Model\Model as Model;

class HomeController extends BaseController {
	
	public function index(){
		return '<h1>Welcome</h1>';
	}

}