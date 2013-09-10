<?php
/**
 * IndexController
 *
 * PHP version 5.4
 *
 * @category   MyWedding
 * @package    Application
 * @subpackage Index
 * @author     Daniel Chaves <daniel@danielchaves.com.br>
 * @license    http://mywedding.com.br/licence MIT
 * @link       none
 */

namespace Application\Controller;

use Core\Controller\ActionController;
use Zend\View\Model\ViewModel;
use Application\Form\Login;
use Application\Form\Cadastro;


class IndexController extends ActionController
{


    /**
     * Index Controller
     * (non-PHPdoc)
     *
     * @see    Zend\Mvc\Controller\AbstractActionController::indexAction()
     * @return Zend\View\Model\ViewModel
     */
    public function indexAction()
    {

    	$loginForm = new Login();
    	$cadastroForm = new Cadastro();
    	$this->layout('layout/homepage');

        $viewModel = new ViewModel(array(
        		'loginForm'   => $loginForm,
                'cadastroForm'=> $cadastroForm,
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

    public function cadastroAction()
    {

        $form = new Cadastro();
        $request = $this->getRequest();
        if($request->isPost()){


        }

    }


}
