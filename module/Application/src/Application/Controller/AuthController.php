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
	    
	  $response = null;
	    
	   switch ($Opauth->env['callback_transport']) {
            case 'session':
                if (isset($_SESSION['opauth'])) {
                    $response = $_SESSION['opauth'];
                    unset($_SESSION['opauth']);
                }
                break;
            case 'post':
                if (isset($_POST['opauth']))
                    $response = unserialize(base64_decode($_POST['opauth']));
                break;
            case 'get':
                if (isset($_GET['opauth']))
                    $response = unserialize(base64_decode($_GET['opauth']));
                break;
        }
        
        if (!is_array($response) || $response == null) {
            throw  new \Exception("Resposta Invalida");
        }
	    
        if (array_key_exists('error', $response)) {
            throw new \Exception("Erro no Plugion");
        }
        
        if(!$opauth->validate(sha1(print_r($response['auth'], true)), $response['timestamp'], $response['signature'], $reason)){
            throw new \Exception("Erro no Plugion");
        }
        
       
            $dados = $this->getEntityManager()->getRepository('Core\Entity\Site\FacebookAuth')->findOneBy(array('uid' => $response['auth']['uid']));
            if($dados->getIdUser() <> ''){
                                
            }else{
                
                $em = $this->getEntityManager()->getRepository('Core\Entity\Site\FacebookAuth');
                $FBData = new \Core\Entity\Site\FacebookAuth;
                $FBData->setUid($response['auth']['uid']);
                $FBData->setName($response['auth']['info']['name']);
                $FBData->setImage($response['auth']['info']['image']);
                $FBData->setFacebookUrl($response['auth']['info']['urls']['facebook']);
                $FBData->setToken($response['auth']['credentials']['token']);
                $FBData->setExpiresToken($response['auth']['credentials']['expires']);
                $FBData->setGender($response['auth']['raw']['gender']);
                $FBData->setTimezone($response['auth']['raw']['timezone']);
                $FBData->setLocale($response['auth']['raw']['locale']);
                $FBData->setSignature($response['signature']);
                $this->getEntityManager()->persist($FBData);
                $this->getEntityManager()->flush();
                
                echo $FBData->getId;
                
            }
	}
            
       
	
}
