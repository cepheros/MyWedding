<?php

namespace Users;

class Module
{

	public function onBootstrap($e)
	{

		/** @var \Zend\ModuleManager\ModuleManager $moduleManager */
		$moduleManager = $e->getApplication()->getServiceManager()->get('modulemanager');
		/** @var \Zend\EventManager\SharedEventManager $sharedEvents */
		$sharedEvents = $moduleManager->getEventManager()->getSharedManager();

		//adiciona eventos ao módulo
		$sharedEvents->attach('Zend\Mvc\Controller\AbstractActionController', \Zend\Mvc\MvcEvent::EVENT_DISPATCH, array($this, 'mvcPreDispatch'), 100);


	}


    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
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

}