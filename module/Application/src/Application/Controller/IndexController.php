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


class IndexController extends ActionController
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
        $this->layout('layout/homepage');
        $viewModel = new ViewModel();

        return $viewModel;

    }


    /**
     * loginAction
     * 
     * Responsável pelo login do cliente no sistema
     * Renderiza formulário de login e trata os dados enviados
     */
    public function loginAction()
    {

    }


    public function sendContactAction()
    {

    }


}
