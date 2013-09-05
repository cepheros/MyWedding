<?php
namespace Application\Form;

use Zend\Form\Form;


class Login extends Form 
{
	public function __construct()
	{
		parent::__construct();
		
		
		$this->add(array(
			'name'=>'userName',
			'attributes' => array(
			    'type'=>'text',
				'class'=> 'form-control required',	
				'placeholder' => 'Usuário',
				'id' => 'userName'
			    ),
			'options'=> array(
			    'label' => 'Usuário'
			    ),			
		));
		
		$this->add(array(
		    'name'=>'password',
		    'attributes' => array(
		        'type'=>'password',
		    	'class'=> 'form-control required',
		    	'placeholder' => 'Senha',
		    	'id' => 'password'
		    ),
		    'options'=> array(
		        'label' => 'Senha'
		    ),
		));
		
		
		$this->add(array(
		    'name'=>'submit',
		    'attributes' => array(
		        'type'=>'submit',
		    	'value' => 'Entrar',
		    	'class' => 'btn btn-info  btn-block',
		    	'id' => 'sendUserLogin'
		    	
		    ),
		));
		
		
	}
	
}