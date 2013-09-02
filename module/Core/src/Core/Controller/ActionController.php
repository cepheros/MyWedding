<?php
namespace Core\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Core\Db\TableGateway;
use Doctrine\ORM\EntityManager;


class ActionController extends AbstractActionController
{
	/**
	 * @var Doctrine\ORM\EntityManager
	 */
	protected $em;
	
	/**
     * Returns a TableGateway
     *
     * @param  string $table
     * @return TableGateway
     */
	protected function getTable($table)
    {
        $sm = $this->getServiceLocator();
        $dbAdapter = $sm->get('DbAdapter');
        $tableGateway = new TableGateway($dbAdapter, $table, new $table);
        $tableGateway->initialize();

        return $tableGateway;
    }

    /**
     * Returns a Service
     *
     * @param  string $service
     * @return Service
     */
    protected function getService($service)
    {
        return $this->getServiceLocator()->get($service);
    }
   

    public function setEntityManager(EntityManager $em)
    {
        $this->em = $em;
    }    
    /**
     * Return a EntityManager
     *
     * @return Doctrine\ORM\EntityManager
     */
    protected function getEntityManager()
    {
    	if ($this->em === null) {
    		$this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    	}
    
    	return $this->em;
    }
    
    
    
    
    
    
}