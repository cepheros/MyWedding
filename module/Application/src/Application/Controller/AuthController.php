<?php

/**
* AuthController
*
* PHP version 5.4
*
* @category   MyWedding
* @package    Application
* @subpackage Auth
* @author     Daniel Chaves <daniel@danielchaves.com.br>
* @license    http://mywedding.com.br/licence MIT
* @link       none
*/

namespace Application\Controller;

use Core\Controller\ActionController;
use Zend\View\Model\ViewModel;
use Application\Form\Login;


class AuthController extends ActionController
{


	/**
	 * Index Controller
	 * (non-PHPdoc)
	 *
	 * @see    \Zend\Mvc\Controller\AbstractActionController::indexAction()
	 * @return Zend\View\Model\ViewModel
	 */
	public function indexAction()
	{

		$loginForm = new Login();
		$this->layout('layout/homepage');

		$viewModel = new ViewModel(array(
				'loginForm' => $loginForm,
		));
		return $viewModel;

	}


	/**
	 * loginAction
	 *
	 * Responsável pelo login do cliente no sistema
	 * Renderiza formulário de login e trata os dados enviados
	 * @see    \Zend\Mvc\Controller\AbstractActionController
	 * @return Zend\View\Model\ViewModel
	 */
	public function loginAction()
	{
		 
		$form = new Login();
		$request = $this->getRequest();
		if($request->isPost()){

		}

	}


	public function sendContactAction()
	{

	}


}
