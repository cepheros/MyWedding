<?php 
namespace Application\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Application\Form\Login;

/**
 * Helper que inclui a sessão nas views
 *
 * @category Application
 * @package Helper
 * @author  Daniel Chaves <daniel@danielchaves.com.br>
 */
class LoginForm extends AbstractHelper implements ServiceLocatorAwareInterface
{
    /**
     * Set the service locator.
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return CustomHelper
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
        return $this;
    }
    /**
     * Get the service locator.
     *
     * @return \Zend\ServiceManager\ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }
    public function __invoke()
    {
        $form = new Login();
        return $form;
    }
}
