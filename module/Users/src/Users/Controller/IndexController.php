<?php

namespace Users\Controller;

use Zend\View\Model\ViewModel;
use Core\Controller\ActionController;

class IndexController extends ActionController
{
    /**
     * Mostra os posts cadastrados
     * @return void
     */
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function loginAction()
    {
    	
    	return new ViewModel();
    	
    }


}