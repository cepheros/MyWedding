<?php

namespace Core\Entity\Home;

use Core\Model\OrmEntity;
use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;


/**
 * Banner Inicial
 *
 * @ORM\Entity
 * @ORM\Table(name="tblhome_firstbanner")
 */

class FirstBanner extends OrmEntity
{
	
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @ORM\Column(type="integer")
	 * @var integer
	 */
	
	protected $id;
	
	/**
	 * @ORM\Column(type="string",length=550)
	 * @var string
	 */
	
	protected $text;

	/**
	 * @return the integer
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param integer $id
	 */
	public function setId(integer $id) {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return the string
	 */
	public function getText() {
		return $this->text;
	}
	
	/**
	 * @param string $text
	 */
	public function setText(string $text) {
		$this->text = $text;
		return $this;
	}
	
	
	/**
	 * Configura os filtros dos campos da entidade
	 *
	 * @return Zend\InputFilter\InputFilter
	 */
	public function getInputFilter()
	{
	    if (! $this->inputFilter) {
	        $inputFilter = new InputFilter();
	
	        $factory = new InputFactory();
	
	        $inputFilter->add($factory->createInput(array(
	            'name' => 'id',
	            'required '=> true,
	            'filters' => array(
	                array('name' => 'Int')
	            ),
	
	        )));
	
	        $inputFilter->add($factory->createInput(array(
	            'name'     => 'text',
	            'required' => true,
	            'filters'  => array(
	                array('name' => 'StripTags'),
	                array('name' => 'StringTrim'),
	            ),
	            'validators' => array(
	                array(
	                    'name'    => 'StringLength',
	                    'options' => array(
	                        'encoding' => 'UTF-8',
	                        'min'      => 1,
	                        'max'      => 500,
	                    ),
	                ),
	            ),
	        )));
	       
	    }
	}
	
	
    
	
}

?>