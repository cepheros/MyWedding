<?php
namespace Core\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Messages extends AbstractHelper implements ServiceLocatorAwareInterface
{
    
    private $type;
    private $message;
    private $closeButton;
    
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
    public function __invoke($type,$message,$closeButton = true)
    {
        $this->setType($type);
        $this->setMessage($message);
        $this->setCloseButton($closeButton);  
              
        return $this->render();
    }
    
  
    

	public function getType() {
		return $this->type;
	}
	
	public function setType($type) {
		$this->type = $type;
		return $this;
	}
	
	public function getMessage() {
		return $this->message;
	}
	
	public function setMessage($message) {
		$this->message = $message;
		return $this;
	}
	
	public function getCloseButton() {
		return $this->closeButton;
	}
	
	public function setCloseButton($closeButton) {
		$this->closeButton = $closeButton;
		return $this;
	}
	
    
	public function render()
	{
	    $type = $this->getRealType($this->getType());
	    $html = "<div class=\"alert $type\">";
	    if($this->getCloseButton()){
	        $html.= "<button class=\"close\" data-dismiss=\"alert\"></button>";
	    }
	    $html.= $this->getMessage();
	    $html.= "</div>";
	
	}
	
	private function getRealType($type){
	    
	    
	    switch($type){
	    	case 'success':
	    	   return 'alert-success';
	    	break;
	    	
	    	case 'error':
	    	    return 'alert-error';
	    	break;
	    	
	    	case 'info':
	    	    return 'alert-info';
	    	break;
	    	
	    	default:
	    	    return '';
	    	break;
	    }
	    
	}
    
    
    
}