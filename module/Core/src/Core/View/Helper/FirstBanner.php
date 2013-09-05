<?php
namespace Core\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Helper que inclui a sessão nas views
 *
 * @category Core
 * @package View\Helper
 * @author  Daniel Chaves <daniel@danielchaves.com.br>
 */
class FirstBanner extends AbstractHelper implements ServiceLocatorAwareInterface
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
	 * @return \Doctrine\ORM\EntityManager
	 */
	public function getServiceLocator()
	{
		return $this->serviceLocator;
	}
	public function __invoke()
	{
		$helperPluginManager = $this->getServiceLocator();
		$serviceManager = $helperPluginManager->getServiceLocator();
		
		$cache = $serviceManager->get('Cache');
		if($data = $cache->getItem('HomeFirstBanner')){
			return $data;
		}else{
			$menus = $serviceManager->get('Doctrine\ORM\EntityManager');
			$data = $menus->getRepository('Core\Entity\Home\FirstBanner')->findAll();
			$cache->addItem('HomeFirstBanner',$data);
			return $data;
			
		}
		
		
		

		
	}
}