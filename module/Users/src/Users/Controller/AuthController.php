<?php
namespace Users\Controller;

use Zend\View\Model\ViewModel;
use Core\Controller\ActionController;

class AuthController extends ActionController
{
	
	public function indexAction()
	{
		return new ViewModel();
	}

	public function makeAction()
	{
		 
		return new ViewModel();
		 
	}


}