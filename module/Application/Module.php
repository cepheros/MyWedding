<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;

class Module
{
    public function onBootstrap($e)
    {
        $e->getApplication()->getServiceManager()->get('translator');
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function mvcPreDispatch($event)
    {
    	$di = $event->getTarget()->getServiceLocator();
    	$routeMatch = $event->getRouteMatch();
    	$moduleName = $routeMatch->getParam('module');
    	$controllerName = $routeMatch->getParam('controller');
    	$actionName = $routeMatch->getParam('action');
    	
    	$authService = $di->get('Core\Service\Auth\Users');
    	
    	if(! $authService->authorize($moduleName,$controllerName,$actionName))
    	{
    		throw new \Exception('Você não tem autorização de acesso a este recurso');
    	}
    	
    	return true;
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
