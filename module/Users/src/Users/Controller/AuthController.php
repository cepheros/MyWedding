<?php
namespace Users\Controller;

use Core\Controller\ActionController;
use Zend\View\Model\ViewModel;


class AuthController extends ActionController
{

	public function indexAction()
	{
		return new ViewModel();
	}

	public function cadastroAction()
	{

	}

	public function makeAction()
	{

		return new ViewModel();

	}


}