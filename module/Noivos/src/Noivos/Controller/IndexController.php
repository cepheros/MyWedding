<?php

/**
 * IndexController
 *
 * PHP version 5.4
 *
 * @category   MyWedding
 * @package    Noivos
 * @subpackage Index
 * @author     Daniel Chaves <daniel@danielchaves.com.br>
 * @license    http://mywedding.com.br/licence MIT
 * @link       none
 */

namespace Noivos\Controller;

use Core\Controller\ActionController;
use Zend\View\Model\ViewModel;


class IndexController extends ActionController
{
    public function indexAction()
    {
        return array();
    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /index/index/foo
        return array();
    }

    public function loginAction()
    {
        $view = new ViewModel();
        $view->setTerminal(true);

        return $view;



    }
}
