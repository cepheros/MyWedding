<?php

namespace Application\Controller;

use Core\Controller\ActionController;
use Zend\View\Model\ViewModel;
use Application\Form\Login;

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
		//$this->layout('layout/homepage');

		$viewModel = new ViewModel(array(
				'loginForm' => $loginForm,
		));
		return $viewModel;

	}
	
	
	public function facebookAction(){
	   
	     $config = $this->getServiceLocator()->get('config'); 
	    
	      $Auth = new \Opauth($config['oauth']);
	   
	    
	}
	
	public function twitterAction(){
	
	    $config = $this->getServiceLocator()->get('config');
	     
	    $Auth = new \Opauth($config['oauth']);
	
	     
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
	    
	    $request = $this->getRequest();
	    if(!$request->isPost()){
	        throw new \Exception("Acesso Inválido");
	    }
	    
	    $data = $request->getPost();
	    $service = $this->getService("Core\Service\Auth\Users");
	    $auth = $service->authenticate(array(
	    	'userName' => $data['userName'],
	        'password' => $data['password']
	        
	    ));
	    
	    if($auth){
	        $this->getService('Zend\Log')->info("Login Efetuado");
	        $this->redirect()->toUrl("/application/index/index/auth/true");
	    
	    }
	    
		 
		

	}


	public function sendContactAction()
	{

	}
	
	public function cadastroAction()
	{
	    $this->layout('layout/homepage');
	     
	    $users = new \Core\Entity\Site\Users();
	    $form = new \Application\Form\Cadastro();
	    $request = $this->getRequest();
	
	    if($request->isPost()){
	        $data = $request->getPost();
	        $form->setInputFilter($users->getInputFilter());
	        $form->setData($data);
	
	        if($form->isValid()){
	
	            $em = $this->getEntityManager()->getRepository('Core\Entity\Site\Users');
	            $data = get_object_vars($data);
	            $data['password'] = sha1(md5($data['password']));
	            $data['dataCasamento'] = \DateTime::createFromFormat('d/m/Y',$data['dataCasamento']);
	            $users->populate($data);
	            $this->getEntityManager()->persist($users);
	            $this->getEntityManager()->flush();
	            $this->getService('Zend\Log')->info("Novo Usuário Criado no Sistema");
	            return $this->redirect()->toUrl('/noivos/index/login/new/true');
	        }else{
	            return new ViewModel(array(
	                'form'=>$form,
	                'messages' => $form->getMessages(),
	            ));
	        }
	    }else{
	        return $this->redirect()->toUrl('/');
	    }
	
	}
	
	
	public function logoutAction(){
	    $service = $this->getService("Core\Service\Auth\Users");
	    if($service->logout()){
	        $this->getService('Zend\Log')->info("Logout Efetuado");
	        return $this->redirect()->toUrl('/');
	        
	    }
	    
	    
	    
	}
	
	public function callbackAction(){
	    
	    $config = $this->getServiceLocator()->get('config');
	     
	    $Opauth = new \Opauth($config['oauth']);
	    
	    $response = array();
	    
	    $request = $this->getRequest();
	    if($request->isPost()){
	        $data = $request->getPost();
	        $response =   unserialize(base64_decode( $data['opauth'] ));
	        
	    }
	    
	    if($request->isGet()){
	        $data = $request->getQuery();
	        $response =   unserialize(base64_decode( $data['opauth'] ));
	    }
	    
        if (array_key_exists('error', $response)) {
            throw new \Exception("Erro no Plugion");
        }
        
        var_dump($response);

	    
	}


}
